webpackJsonp([4],{

/***/ 138:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

exports.default = MarkerClusterer;
/* eslint-disable */
// ==ClosureCompiler==
// @compilation_level ADVANCED_OPTIMIZATIONS
// @externs_url http://closure-compiler.googlecode.com/svn/trunk/contrib/externs/maps/google_maps_api_v3_3.js
// ==/ClosureCompiler==

/**
 * @name MarkerClusterer for Google Maps v3
 * @version version 1.0.1
 * @author Luke Mahe
 * @fileoverview
 * The library creates and manages per-zoom-level clusters for large amounts of
 * markers.
 */

/**
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * A Marker Clusterer that clusters markers.
 *
 * @param {google.maps.Map} map The Google map to attach to.
 * @param {Array.<google.maps.Marker>=} opt_markers Optional markers to add to
 *   the cluster.
 * @param {Object=} opt_options support the following options:
 *     'gridSize': (number) The grid size of a cluster in pixels.
 *     'maxZoom': (number) The maximum zoom level that a marker can be part of a
 *                cluster.
 *     'zoomOnClick': (boolean) Whether the default behaviour of clicking on a
 *                    cluster is to zoom into it.
 *     'imagePath': (string) The base URL where the images representing
 *                  clusters will be found. The full URL will be:
 *                  {imagePath}[1-5].{imageExtension}
 *                  Default: '../images/m'.
 *     'imageExtension': (string) The suffix for images URL representing
 *                       clusters will be found. See _imagePath_ for details.
 *                       Default: 'png'.
 *     'averageCenter': (boolean) Whether the center of each cluster should be
 *                      the average of all markers in the cluster.
 *     'minimumClusterSize': (number) The minimum number of markers to be in a
 *                           cluster before the markers are hidden and a count
 *                           is shown.
 *     'styles': (object) An object that has style properties:
 *       'url': (string) The image url.
 *       'height': (number) The image height.
 *       'width': (number) The image width.
 *       'anchor': (Array) The anchor position of the label text.
 *       'textColor': (string) The text color.
 *       'textSize': (number) The text size.
 *       'backgroundPosition': (string) The position of the backgound x, y.
 * @constructor
 * @extends google.maps.OverlayView
 */
function MarkerClusterer(map, opt_markers, opt_options) {
  // MarkerClusterer implements google.maps.OverlayView interface. We use the
  // extend function to extend MarkerClusterer with google.maps.OverlayView
  // because it might not always be available when the code is defined so we
  // look for it at the last possible moment. If it doesn't exist now then
  // there is no point going ahead :)
  this.extend(MarkerClusterer, google.maps.OverlayView);
  this.map_ = map;

  /**
   * @type {Array.<google.maps.Marker>}
   * @private
   */
  this.markers_ = [];

  /**
   *  @type {Array.<Cluster>}
   */
  this.clusters_ = [];

  this.sizes = [53, 56, 66, 78, 90];

  /**
   * @private
   */
  this.styles_ = [];

  /**
   * @type {boolean}
   * @private
   */
  this.ready_ = false;

  var options = opt_options || {};

  /**
   * @type {number}
   * @private
   */
  this.gridSize_ = options['gridSize'] || 60;

  /**
   * @private
   */
  this.minClusterSize_ = options['minimumClusterSize'] || 2;

  /**
   * @type {?number}
   * @private
   */
  this.maxZoom_ = options['maxZoom'] || null;

  this.styles_ = options['styles'] || [];

  /**
   * @type {string}
   * @private
   */
  this.imagePath_ = options['imagePath'] || this.MARKER_CLUSTER_IMAGE_PATH_;

  /**
   * @type {string}
   * @private
   */
  this.imageExtension_ = options['imageExtension'] || this.MARKER_CLUSTER_IMAGE_EXTENSION_;

  /**
   * @type {boolean}
   * @private
   */
  this.zoomOnClick_ = true;

  if (options['zoomOnClick'] != undefined) {
    this.zoomOnClick_ = options['zoomOnClick'];
  }

  /**
   * @type {boolean}
   * @private
   */
  this.averageCenter_ = false;

  if (options['averageCenter'] != undefined) {
    this.averageCenter_ = options['averageCenter'];
  }

  this.setupStyles_();

  this.setMap(map);

  /**
   * @type {number}
   * @private
   */
  this.prevZoom_ = this.map_.getZoom();

  // Add the map event listeners
  var that = this;
  google.maps.event.addListener(this.map_, 'zoom_changed', function () {
    // Determines map type and prevent illegal zoom levels
    var zoom = that.map_.getZoom();
    var minZoom = that.map_.minZoom || 0;
    var maxZoom = Math.min(that.map_.maxZoom || 100, that.map_.mapTypes[that.map_.getMapTypeId()].maxZoom);
    zoom = Math.min(Math.max(zoom, minZoom), maxZoom);

    if (that.prevZoom_ != zoom) {
      that.prevZoom_ = zoom;
      that.resetViewport();
    }
  });

  google.maps.event.addListener(this.map_, 'idle', function () {
    that.redraw();
  });

  // Finally, add the markers
  if (opt_markers && (opt_markers.length || Object.keys(opt_markers).length)) {
    this.addMarkers(opt_markers, false);
  }
}

/**
 * The marker cluster image path.
 *
 * @type {string}
 * @private
 */
MarkerClusterer.prototype.MARKER_CLUSTER_IMAGE_PATH_ = '../images/m';

/**
 * The marker cluster image path.
 *
 * @type {string}
 * @private
 */
MarkerClusterer.prototype.MARKER_CLUSTER_IMAGE_EXTENSION_ = 'png';

/**
 * Extends a objects prototype by anothers.
 *
 * @param {Object} obj1 The object to be extended.
 * @param {Object} obj2 The object to extend with.
 * @return {Object} The new extended object.
 * @ignore
 */
MarkerClusterer.prototype.extend = function (obj1, obj2) {
  return function (object) {
    for (var property in object.prototype) {
      this.prototype[property] = object.prototype[property];
    }
    return this;
  }.apply(obj1, [obj2]);
};

/**
 * Implementaion of the interface method.
 * @ignore
 */
MarkerClusterer.prototype.onAdd = function () {
  this.setReady_(true);
};

/**
 * Implementaion of the interface method.
 * @ignore
 */
MarkerClusterer.prototype.draw = function () {};

/**
 * Sets up the styles object.
 *
 * @private
 */
MarkerClusterer.prototype.setupStyles_ = function () {
  if (this.styles_.length) {
    return;
  }

  for (var i = 0, size; size = this.sizes[i]; i++) {
    this.styles_.push({
      url: this.imagePath_ + (i + 1) + '.' + this.imageExtension_,
      height: size,
      width: size
    });
  }
};

/**
 *  Fit the map to the bounds of the markers in the clusterer.
 */
MarkerClusterer.prototype.fitMapToMarkers = function () {
  var markers = this.getMarkers();
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0, marker; marker = markers[i]; i++) {
    bounds.extend(marker.getPosition());
  }

  this.map_.fitBounds(bounds);
};

/**
 *  Sets the styles.
 *
 *  @param {Object} styles The style to set.
 */
MarkerClusterer.prototype.setStyles = function (styles) {
  this.styles_ = styles;
};

/**
 *  Gets the styles.
 *
 *  @return {Object} The styles object.
 */
MarkerClusterer.prototype.getStyles = function () {
  return this.styles_;
};

/**
 * Whether zoom on click is set.
 *
 * @return {boolean} True if zoomOnClick_ is set.
 */
MarkerClusterer.prototype.isZoomOnClick = function () {
  return this.zoomOnClick_;
};

/**
 * Whether average center is set.
 *
 * @return {boolean} True if averageCenter_ is set.
 */
MarkerClusterer.prototype.isAverageCenter = function () {
  return this.averageCenter_;
};

/**
 *  Returns the array of markers in the clusterer.
 *
 *  @return {Array.<google.maps.Marker>} The markers.
 */
MarkerClusterer.prototype.getMarkers = function () {
  return this.markers_;
};

/**
 *  Returns the number of markers in the clusterer
 *
 *  @return {Number} The number of markers.
 */
MarkerClusterer.prototype.getTotalMarkers = function () {
  return this.markers_.length;
};

/**
 *  Sets the max zoom for the clusterer.
 *
 *  @param {number} maxZoom The max zoom level.
 */
MarkerClusterer.prototype.setMaxZoom = function (maxZoom) {
  this.maxZoom_ = maxZoom;
};

/**
 *  Gets the max zoom for the clusterer.
 *
 *  @return {number} The max zoom level.
 */
MarkerClusterer.prototype.getMaxZoom = function () {
  return this.maxZoom_;
};

/**
 *  The function for calculating the cluster icon image.
 *
 *  @param {Array.<google.maps.Marker>} markers The markers in the clusterer.
 *  @param {number} numStyles The number of styles available.
 *  @return {Object} A object properties: 'text' (string) and 'index' (number).
 *  @private
 */
MarkerClusterer.prototype.calculator_ = function (markers, numStyles) {
  var index = 0;
  var count = markers.length;
  var dv = count;
  while (dv !== 0) {
    dv = parseInt(dv / 10, 10);
    index++;
  }

  index = Math.min(index, numStyles);
  return {
    text: count,
    index: index
  };
};

/**
 * Set the calculator function.
 *
 * @param {function(Array, number)} calculator The function to set as the
 *     calculator. The function should return a object properties:
 *     'text' (string) and 'index' (number).
 *
 */
MarkerClusterer.prototype.setCalculator = function (calculator) {
  this.calculator_ = calculator;
};

/**
 * Get the calculator function.
 *
 * @return {function(Array, number)} the calculator function.
 */
MarkerClusterer.prototype.getCalculator = function () {
  return this.calculator_;
};

/**
 * Add an array of markers to the clusterer.
 *
 * @param {Array.<google.maps.Marker>} markers The markers to add.
 * @param {boolean=} opt_nodraw Whether to redraw the clusters.
 */
MarkerClusterer.prototype.addMarkers = function (markers, opt_nodraw) {
  if (markers.length) {
    for (var i = 0, marker; marker = markers[i]; i++) {
      this.pushMarkerTo_(marker);
    }
  } else if (Object.keys(markers).length) {
    for (var marker in markers) {
      this.pushMarkerTo_(markers[marker]);
    }
  }
  if (!opt_nodraw) {
    this.redraw();
  }
};

/**
 * Pushes a marker to the clusterer.
 *
 * @param {google.maps.Marker} marker The marker to add.
 * @private
 */
MarkerClusterer.prototype.pushMarkerTo_ = function (marker) {
  marker.isAdded = false;
  if (marker['draggable']) {
    // If the marker is draggable add a listener so we update the clusters on
    // the drag end.
    var that = this;
    google.maps.event.addListener(marker, 'dragend', function () {
      marker.isAdded = false;
      that.repaint();
    });
  }
  this.markers_.push(marker);
};

/**
 * Adds a marker to the clusterer and redraws if needed.
 *
 * @param {google.maps.Marker} marker The marker to add.
 * @param {boolean=} opt_nodraw Whether to redraw the clusters.
 */
MarkerClusterer.prototype.addMarker = function (marker, opt_nodraw) {
  this.pushMarkerTo_(marker);
  if (!opt_nodraw) {
    this.redraw();
  }
};

/**
 * Removes a marker and returns true if removed, false if not
 *
 * @param {google.maps.Marker} marker The marker to remove
 * @return {boolean} Whether the marker was removed or not
 * @private
 */
MarkerClusterer.prototype.removeMarker_ = function (marker) {
  var index = -1;
  if (this.markers_.indexOf) {
    index = this.markers_.indexOf(marker);
  } else {
    for (var i = 0, m; m = this.markers_[i]; i++) {
      if (m == marker) {
        index = i;
        break;
      }
    }
  }

  if (index == -1) {
    // Marker is not in our list of markers.
    return false;
  }

  marker.setMap(null);

  this.markers_.splice(index, 1);

  return true;
};

/**
 * Remove a marker from the cluster.
 *
 * @param {google.maps.Marker} marker The marker to remove.
 * @param {boolean=} opt_nodraw Optional boolean to force no redraw.
 * @return {boolean} True if the marker was removed.
 */
MarkerClusterer.prototype.removeMarker = function (marker, opt_nodraw) {
  var removed = this.removeMarker_(marker);

  if (!opt_nodraw && removed) {
    this.resetViewport();
    this.redraw();
    return true;
  } else {
    return false;
  }
};

/**
 * Removes an array of markers from the cluster.
 *
 * @param {Array.<google.maps.Marker>} markers The markers to remove.
 * @param {boolean=} opt_nodraw Optional boolean to force no redraw.
 */
MarkerClusterer.prototype.removeMarkers = function (markers, opt_nodraw) {
  // create a local copy of markers if required
  // (removeMarker_ modifies the getMarkers() array in place)
  var markersCopy = markers === this.getMarkers() ? markers.slice() : markers;
  var removed = false;

  for (var i = 0, marker; marker = markersCopy[i]; i++) {
    var r = this.removeMarker_(marker);
    removed = removed || r;
  }

  if (!opt_nodraw && removed) {
    this.resetViewport();
    this.redraw();
    return true;
  }
};

/**
 * Sets the clusterer's ready state.
 *
 * @param {boolean} ready The state.
 * @private
 */
MarkerClusterer.prototype.setReady_ = function (ready) {
  if (!this.ready_) {
    this.ready_ = ready;
    this.createClusters_();
  }
};

/**
 * Returns the number of clusters in the clusterer.
 *
 * @return {number} The number of clusters.
 */
MarkerClusterer.prototype.getTotalClusters = function () {
  return this.clusters_.length;
};

/**
 * Returns the google map that the clusterer is associated with.
 *
 * @return {google.maps.Map} The map.
 */
MarkerClusterer.prototype.getMap = function () {
  return this.map_;
};

/**
 * Sets the google map that the clusterer is associated with.
 *
 * @param {google.maps.Map} map The map.
 */
MarkerClusterer.prototype.setMap = function (map) {
  this.map_ = map;
};

/**
 * Returns the size of the grid.
 *
 * @return {number} The grid size.
 */
MarkerClusterer.prototype.getGridSize = function () {
  return this.gridSize_;
};

/**
 * Sets the size of the grid.
 *
 * @param {number} size The grid size.
 */
MarkerClusterer.prototype.setGridSize = function (size) {
  this.gridSize_ = size;
};

/**
 * Returns the min cluster size.
 *
 * @return {number} The grid size.
 */
MarkerClusterer.prototype.getMinClusterSize = function () {
  return this.minClusterSize_;
};

/**
 * Sets the min cluster size.
 *
 * @param {number} size The grid size.
 */
MarkerClusterer.prototype.setMinClusterSize = function (size) {
  this.minClusterSize_ = size;
};

/**
 * Extends a bounds object by the grid size.
 *
 * @param {google.maps.LatLngBounds} bounds The bounds to extend.
 * @return {google.maps.LatLngBounds} The extended bounds.
 */
MarkerClusterer.prototype.getExtendedBounds = function (bounds) {
  var projection = this.getProjection();

  // Turn the bounds into latlng.
  var tr = new google.maps.LatLng(bounds.getNorthEast().lat(), bounds.getNorthEast().lng());
  var bl = new google.maps.LatLng(bounds.getSouthWest().lat(), bounds.getSouthWest().lng());

  // Convert the points to pixels and the extend out by the grid size.
  var trPix = projection.fromLatLngToDivPixel(tr);
  trPix.x += this.gridSize_;
  trPix.y -= this.gridSize_;

  var blPix = projection.fromLatLngToDivPixel(bl);
  blPix.x -= this.gridSize_;
  blPix.y += this.gridSize_;

  // Convert the pixel points back to LatLng
  var ne = projection.fromDivPixelToLatLng(trPix);
  var sw = projection.fromDivPixelToLatLng(blPix);

  // Extend the bounds to contain the new bounds.
  bounds.extend(ne);
  bounds.extend(sw);

  return bounds;
};

/**
 * Determins if a marker is contained in a bounds.
 *
 * @param {google.maps.Marker} marker The marker to check.
 * @param {google.maps.LatLngBounds} bounds The bounds to check against.
 * @return {boolean} True if the marker is in the bounds.
 * @private
 */
MarkerClusterer.prototype.isMarkerInBounds_ = function (marker, bounds) {
  return bounds.contains(marker.getPosition());
};

/**
 * Clears all clusters and markers from the clusterer.
 */
MarkerClusterer.prototype.clearMarkers = function () {
  this.resetViewport(true);

  // Set the markers a empty array.
  this.markers_ = [];
};

/**
 * Clears all existing clusters and recreates them.
 * @param {boolean} opt_hide To also hide the marker.
 */
MarkerClusterer.prototype.resetViewport = function (opt_hide) {
  // Remove all the clusters
  for (var i = 0, cluster; cluster = this.clusters_[i]; i++) {
    cluster.remove();
  }

  // Reset the markers to not be added and to be invisible.
  for (var i = 0, marker; marker = this.markers_[i]; i++) {
    marker.isAdded = false;
    if (opt_hide) {
      marker.setMap(null);
    }
  }

  this.clusters_ = [];
};

/**
 *
 */
MarkerClusterer.prototype.repaint = function () {
  var oldClusters = this.clusters_.slice();
  this.clusters_.length = 0;
  this.resetViewport();
  this.redraw();

  // Remove the old clusters.
  // Do it in a timeout so the other clusters have been drawn first.
  window.setTimeout(function () {
    for (var i = 0, cluster; cluster = oldClusters[i]; i++) {
      cluster.remove();
    }
  }, 0);
};

/**
 * Redraws the clusters.
 */
MarkerClusterer.prototype.redraw = function () {
  this.createClusters_();
};

/**
 * Calculates the distance between two latlng locations in km.
 * @see http://www.movable-type.co.uk/scripts/latlong.html
 *
 * @param {google.maps.LatLng} p1 The first lat lng point.
 * @param {google.maps.LatLng} p2 The second lat lng point.
 * @return {number} The distance between the two points in km.
 * @private
*/
MarkerClusterer.prototype.distanceBetweenPoints_ = function (p1, p2) {
  if (!p1 || !p2) {
    return 0;
  }

  var R = 6371; // Radius of the Earth in km
  var dLat = (p2.lat() - p1.lat()) * Math.PI / 180;
  var dLon = (p2.lng() - p1.lng()) * Math.PI / 180;
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(p1.lat() * Math.PI / 180) * Math.cos(p2.lat() * Math.PI / 180) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d;
};

/**
 * Add a marker to a cluster, or creates a new cluster.
 *
 * @param {google.maps.Marker} marker The marker to add.
 * @private
 */
MarkerClusterer.prototype.addToClosestCluster_ = function (marker) {
  var distance = 40000; // Some large number
  var clusterToAddTo = null;
  var pos = marker.getPosition();
  for (var i = 0, cluster; cluster = this.clusters_[i]; i++) {
    var center = cluster.getCenter();
    if (center) {
      var d = this.distanceBetweenPoints_(center, marker.getPosition());
      if (d < distance) {
        distance = d;
        clusterToAddTo = cluster;
      }
    }
  }

  if (clusterToAddTo && clusterToAddTo.isMarkerInClusterBounds(marker)) {
    clusterToAddTo.addMarker(marker);
  } else {
    var cluster = new Cluster(this);
    cluster.addMarker(marker);
    this.clusters_.push(cluster);
  }
};

/**
 * Creates the clusters.
 *
 * @private
 */
MarkerClusterer.prototype.createClusters_ = function () {
  if (!this.ready_) {
    return;
  }

  // Get our current map view bounds.
  // Create a new bounds object so we don't affect the map.
  var mapBounds = new google.maps.LatLngBounds(this.map_.getBounds().getSouthWest(), this.map_.getBounds().getNorthEast());
  var bounds = this.getExtendedBounds(mapBounds);

  for (var i = 0, marker; marker = this.markers_[i]; i++) {
    if (!marker.isAdded && this.isMarkerInBounds_(marker, bounds)) {
      this.addToClosestCluster_(marker);
    }
  }
};

/**
 * A cluster that contains markers.
 *
 * @param {MarkerClusterer} markerClusterer The markerclusterer that this
 *     cluster is associated with.
 * @constructor
 * @ignore
 */
function Cluster(markerClusterer) {
  this.markerClusterer_ = markerClusterer;
  this.map_ = markerClusterer.getMap();
  this.gridSize_ = markerClusterer.getGridSize();
  this.minClusterSize_ = markerClusterer.getMinClusterSize();
  this.averageCenter_ = markerClusterer.isAverageCenter();
  this.center_ = null;
  this.markers_ = [];
  this.bounds_ = null;
  this.clusterIcon_ = new ClusterIcon(this, markerClusterer.getStyles(), markerClusterer.getGridSize());
}

/**
 * Determins if a marker is already added to the cluster.
 *
 * @param {google.maps.Marker} marker The marker to check.
 * @return {boolean} True if the marker is already added.
 */
Cluster.prototype.isMarkerAlreadyAdded = function (marker) {
  if (this.markers_.indexOf) {
    return this.markers_.indexOf(marker) != -1;
  } else {
    for (var i = 0, m; m = this.markers_[i]; i++) {
      if (m == marker) {
        return true;
      }
    }
  }
  return false;
};

/**
 * Add a marker the cluster.
 *
 * @param {google.maps.Marker} marker The marker to add.
 * @return {boolean} True if the marker was added.
 */
Cluster.prototype.addMarker = function (marker) {
  if (this.isMarkerAlreadyAdded(marker)) {
    return false;
  }

  if (!this.center_) {
    this.center_ = marker.getPosition();
    this.calculateBounds_();
  } else {
    if (this.averageCenter_) {
      var l = this.markers_.length + 1;
      var lat = (this.center_.lat() * (l - 1) + marker.getPosition().lat()) / l;
      var lng = (this.center_.lng() * (l - 1) + marker.getPosition().lng()) / l;
      this.center_ = new google.maps.LatLng(lat, lng);
      this.calculateBounds_();
    }
  }

  marker.isAdded = true;
  this.markers_.push(marker);

  var len = this.markers_.length;
  if (len < this.minClusterSize_ && marker.getMap() != this.map_) {
    // Min cluster size not reached so show the marker.
    marker.setMap(this.map_);
  }

  if (len == this.minClusterSize_) {
    // Hide the markers that were showing.
    for (var i = 0; i < len; i++) {
      this.markers_[i].setMap(null);
    }
  }

  if (len >= this.minClusterSize_) {
    marker.setMap(null);
  }

  this.updateIcon();
  return true;
};

/**
 * Returns the marker clusterer that the cluster is associated with.
 *
 * @return {MarkerClusterer} The associated marker clusterer.
 */
Cluster.prototype.getMarkerClusterer = function () {
  return this.markerClusterer_;
};

/**
 * Returns the bounds of the cluster.
 *
 * @return {google.maps.LatLngBounds} the cluster bounds.
 */
Cluster.prototype.getBounds = function () {
  var bounds = new google.maps.LatLngBounds(this.center_, this.center_);
  var markers = this.getMarkers();
  for (var i = 0, marker; marker = markers[i]; i++) {
    bounds.extend(marker.getPosition());
  }
  return bounds;
};

/**
 * Removes the cluster
 */
Cluster.prototype.remove = function () {
  this.clusterIcon_.remove();
  this.markers_.length = 0;
  delete this.markers_;
};

/**
 * Returns the number of markers in the cluster.
 *
 * @return {number} The number of markers in the cluster.
 */
Cluster.prototype.getSize = function () {
  return this.markers_.length;
};

/**
 * Returns a list of the markers in the cluster.
 *
 * @return {Array.<google.maps.Marker>} The markers in the cluster.
 */
Cluster.prototype.getMarkers = function () {
  return this.markers_;
};

/**
 * Returns the center of the cluster.
 *
 * @return {google.maps.LatLng} The cluster center.
 */
Cluster.prototype.getCenter = function () {
  return this.center_;
};

/**
 * Calculated the extended bounds of the cluster with the grid.
 *
 * @private
 */
Cluster.prototype.calculateBounds_ = function () {
  var bounds = new google.maps.LatLngBounds(this.center_, this.center_);
  this.bounds_ = this.markerClusterer_.getExtendedBounds(bounds);
};

/**
 * Determines if a marker lies in the clusters bounds.
 *
 * @param {google.maps.Marker} marker The marker to check.
 * @return {boolean} True if the marker lies in the bounds.
 */
Cluster.prototype.isMarkerInClusterBounds = function (marker) {
  return this.bounds_.contains(marker.getPosition());
};

/**
 * Returns the map that the cluster is associated with.
 *
 * @return {google.maps.Map} The map.
 */
Cluster.prototype.getMap = function () {
  return this.map_;
};

/**
 * Updates the cluster icon
 */
Cluster.prototype.updateIcon = function () {
  var zoom = this.map_.getZoom();
  var mz = this.markerClusterer_.getMaxZoom();

  if (mz && zoom > mz) {
    // The zoom is greater than our max zoom so show all the markers in cluster.
    for (var i = 0, marker; marker = this.markers_[i]; i++) {
      marker.setMap(this.map_);
    }
    return;
  }

  if (this.markers_.length < this.minClusterSize_) {
    // Min cluster size not yet reached.
    this.clusterIcon_.hide();
    return;
  }

  var numStyles = this.markerClusterer_.getStyles().length;
  var sums = this.markerClusterer_.getCalculator()(this.markers_, numStyles);
  this.clusterIcon_.setCenter(this.center_);
  this.clusterIcon_.setSums(sums);
  this.clusterIcon_.show();
};

/**
 * A cluster icon
 *
 * @param {Cluster} cluster The cluster to be associated with.
 * @param {Object} styles An object that has style properties:
 *     'url': (string) The image url.
 *     'height': (number) The image height.
 *     'width': (number) The image width.
 *     'anchor': (Array) The anchor position of the label text.
 *     'textColor': (string) The text color.
 *     'textSize': (number) The text size.
 *     'backgroundPosition: (string) The background postition x, y.
 * @param {number=} opt_padding Optional padding to apply to the cluster icon.
 * @constructor
 * @extends google.maps.OverlayView
 * @ignore
 */
function ClusterIcon(cluster, styles, opt_padding) {
  cluster.getMarkerClusterer().extend(ClusterIcon, google.maps.OverlayView);

  this.styles_ = styles;
  this.padding_ = opt_padding || 0;
  this.cluster_ = cluster;
  this.center_ = null;
  this.map_ = cluster.getMap();
  this.div_ = null;
  this.sums_ = null;
  this.visible_ = false;

  this.setMap(this.map_);
}

/**
 * Triggers the clusterclick event and zoom's if the option is set.
 */
ClusterIcon.prototype.triggerClusterClick = function () {
  var markerClusterer = this.cluster_.getMarkerClusterer();

  // Trigger the clusterclick event.
  google.maps.event.trigger(markerClusterer.map_, 'clusterclick', this.cluster_);

  if (markerClusterer.isZoomOnClick()) {
    // Zoom into the cluster.
    this.map_.fitBounds(this.cluster_.getBounds());
  }
};

/**
 * Adding the cluster icon to the dom.
 * @ignore
 */
ClusterIcon.prototype.onAdd = function () {
  this.div_ = document.createElement('DIV');
  if (this.visible_) {
    var pos = this.getPosFromLatLng_(this.center_);
    this.div_.style.cssText = this.createCss(pos);
    this.div_.innerHTML = this.sums_.text;
  }

  var panes = this.getPanes();
  panes.overlayMouseTarget.appendChild(this.div_);

  var that = this;
  google.maps.event.addDomListener(this.div_, 'click', function () {
    that.triggerClusterClick();
  });
};

/**
 * Returns the position to place the div dending on the latlng.
 *
 * @param {google.maps.LatLng} latlng The position in latlng.
 * @return {google.maps.Point} The position in pixels.
 * @private
 */
ClusterIcon.prototype.getPosFromLatLng_ = function (latlng) {
  var pos = this.getProjection().fromLatLngToDivPixel(latlng);
  pos.x -= parseInt(this.width_ / 2, 10);
  pos.y -= parseInt(this.height_ / 2, 10);
  return pos;
};

/**
 * Draw the icon.
 * @ignore
 */
ClusterIcon.prototype.draw = function () {
  if (this.visible_) {
    var pos = this.getPosFromLatLng_(this.center_);
    this.div_.style.top = pos.y + 'px';
    this.div_.style.left = pos.x + 'px';
    this.div_.style.zIndex = google.maps.Marker.MAX_ZINDEX + 1;
  }
};

/**
 * Hide the icon.
 */
ClusterIcon.prototype.hide = function () {
  if (this.div_) {
    this.div_.style.display = 'none';
  }
  this.visible_ = false;
};

/**
 * Position and show the icon.
 */
ClusterIcon.prototype.show = function () {
  if (this.div_) {
    var pos = this.getPosFromLatLng_(this.center_);
    this.div_.style.cssText = this.createCss(pos);
    this.div_.style.display = '';
  }
  this.visible_ = true;
};

/**
 * Remove the icon from the map
 */
ClusterIcon.prototype.remove = function () {
  this.setMap(null);
};

/**
 * Implementation of the onRemove interface.
 * @ignore
 */
ClusterIcon.prototype.onRemove = function () {
  if (this.div_ && this.div_.parentNode) {
    this.hide();
    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
  }
};

/**
 * Set the sums of the icon.
 *
 * @param {Object} sums The sums containing:
 *   'text': (string) The text to display in the icon.
 *   'index': (number) The style index of the icon.
 */
ClusterIcon.prototype.setSums = function (sums) {
  this.sums_ = sums;
  this.text_ = sums.text;
  this.index_ = sums.index;
  if (this.div_) {
    this.div_.innerHTML = sums.text;
  }

  this.useStyle();
};

/**
 * Sets the icon to the the styles.
 */
ClusterIcon.prototype.useStyle = function () {
  var index = Math.max(0, this.sums_.index - 1);
  index = Math.min(this.styles_.length - 1, index);
  var style = this.styles_[index];
  this.url_ = style['url'];
  this.height_ = style['height'];
  this.width_ = style['width'];
  this.textColor_ = style['textColor'];
  this.anchor_ = style['anchor'];
  this.textSize_ = style['textSize'];
  this.backgroundPosition_ = style['backgroundPosition'];
};

/**
 * Sets the center of the icon.
 *
 * @param {google.maps.LatLng} center The latlng to set as the center.
 */
ClusterIcon.prototype.setCenter = function (center) {
  this.center_ = center;
};

/**
 * Create the css text based on the position of the icon.
 *
 * @param {google.maps.Point} pos The position.
 * @return {string} The css style text.
 */
ClusterIcon.prototype.createCss = function (pos) {
  var style = [];
  style.push('background-image:url(' + this.url_ + ');');
  var backgroundPosition = this.backgroundPosition_ ? this.backgroundPosition_ : '0 0';
  style.push('background-position:' + backgroundPosition + ';');

  if (_typeof(this.anchor_) === 'object') {
    if (typeof this.anchor_[0] === 'number' && this.anchor_[0] > 0 && this.anchor_[0] < this.height_) {
      style.push('height:' + (this.height_ - this.anchor_[0]) + 'px; padding-top:' + this.anchor_[0] + 'px;');
    } else {
      style.push('height:' + this.height_ + 'px; line-height:' + this.height_ + 'px;');
    }
    if (typeof this.anchor_[1] === 'number' && this.anchor_[1] > 0 && this.anchor_[1] < this.width_) {
      style.push('width:' + (this.width_ - this.anchor_[1]) + 'px; padding-left:' + this.anchor_[1] + 'px;');
    } else {
      style.push('width:' + this.width_ + 'px; text-align:center;');
    }
  } else {
    style.push('height:' + this.height_ + 'px; line-height:' + this.height_ + 'px; width:' + this.width_ + 'px; text-align:center;');
  }

  var txtColor = this.textColor_ ? this.textColor_ : 'black';
  var txtSize = this.textSize_ ? this.textSize_ : 11;

  style.push('cursor:pointer; top:' + pos.y + 'px; left:' + pos.x + 'px; color:' + txtColor + '; position:absolute; font-size:' + txtSize + 'px; font-family:Arial,sans-serif; font-weight:bold');
  return style.join('');
};

// Export Symbols for Closure
// If you are not going to compile with closure then you can remove the
// code below.
var window = window || {};
window['MarkerClusterer'] = MarkerClusterer;
MarkerClusterer.prototype['addMarker'] = MarkerClusterer.prototype.addMarker;
MarkerClusterer.prototype['addMarkers'] = MarkerClusterer.prototype.addMarkers;
MarkerClusterer.prototype['clearMarkers'] = MarkerClusterer.prototype.clearMarkers;
MarkerClusterer.prototype['fitMapToMarkers'] = MarkerClusterer.prototype.fitMapToMarkers;
MarkerClusterer.prototype['getCalculator'] = MarkerClusterer.prototype.getCalculator;
MarkerClusterer.prototype['getGridSize'] = MarkerClusterer.prototype.getGridSize;
MarkerClusterer.prototype['getExtendedBounds'] = MarkerClusterer.prototype.getExtendedBounds;
MarkerClusterer.prototype['getMap'] = MarkerClusterer.prototype.getMap;
MarkerClusterer.prototype['getMarkers'] = MarkerClusterer.prototype.getMarkers;
MarkerClusterer.prototype['getMaxZoom'] = MarkerClusterer.prototype.getMaxZoom;
MarkerClusterer.prototype['getStyles'] = MarkerClusterer.prototype.getStyles;
MarkerClusterer.prototype['getTotalClusters'] = MarkerClusterer.prototype.getTotalClusters;
MarkerClusterer.prototype['getTotalMarkers'] = MarkerClusterer.prototype.getTotalMarkers;
MarkerClusterer.prototype['redraw'] = MarkerClusterer.prototype.redraw;
MarkerClusterer.prototype['removeMarker'] = MarkerClusterer.prototype.removeMarker;
MarkerClusterer.prototype['removeMarkers'] = MarkerClusterer.prototype.removeMarkers;
MarkerClusterer.prototype['resetViewport'] = MarkerClusterer.prototype.resetViewport;
MarkerClusterer.prototype['repaint'] = MarkerClusterer.prototype.repaint;
MarkerClusterer.prototype['setCalculator'] = MarkerClusterer.prototype.setCalculator;
MarkerClusterer.prototype['setGridSize'] = MarkerClusterer.prototype.setGridSize;
MarkerClusterer.prototype['setMaxZoom'] = MarkerClusterer.prototype.setMaxZoom;
MarkerClusterer.prototype['onAdd'] = MarkerClusterer.prototype.onAdd;
MarkerClusterer.prototype['draw'] = MarkerClusterer.prototype.draw;

Cluster.prototype['getCenter'] = Cluster.prototype.getCenter;
Cluster.prototype['getSize'] = Cluster.prototype.getSize;
Cluster.prototype['getMarkers'] = Cluster.prototype.getMarkers;

ClusterIcon.prototype['onAdd'] = ClusterIcon.prototype.onAdd;
ClusterIcon.prototype['draw'] = ClusterIcon.prototype.draw;
ClusterIcon.prototype['onRemove'] = ClusterIcon.prototype.onRemove;

Object.keys = Object.keys || function (o) {
  var result = [];
  for (var name in o) {
    if (o.hasOwnProperty(name)) result.push(name);
  }
  return result;
};

/* eslint-enable */

/***/ })

});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2pzL21vZHVsZXMvbWFya2VyY2x1c3RlcmVyLmpzIl0sIm5hbWVzIjpbIk1hcmtlckNsdXN0ZXJlciIsIm1hcCIsIm9wdF9tYXJrZXJzIiwib3B0X29wdGlvbnMiLCJleHRlbmQiLCJnb29nbGUiLCJtYXBzIiwiT3ZlcmxheVZpZXciLCJtYXBfIiwibWFya2Vyc18iLCJjbHVzdGVyc18iLCJzaXplcyIsInN0eWxlc18iLCJyZWFkeV8iLCJvcHRpb25zIiwiZ3JpZFNpemVfIiwibWluQ2x1c3RlclNpemVfIiwibWF4Wm9vbV8iLCJpbWFnZVBhdGhfIiwiTUFSS0VSX0NMVVNURVJfSU1BR0VfUEFUSF8iLCJpbWFnZUV4dGVuc2lvbl8iLCJNQVJLRVJfQ0xVU1RFUl9JTUFHRV9FWFRFTlNJT05fIiwiem9vbU9uQ2xpY2tfIiwidW5kZWZpbmVkIiwiYXZlcmFnZUNlbnRlcl8iLCJzZXR1cFN0eWxlc18iLCJzZXRNYXAiLCJwcmV2Wm9vbV8iLCJnZXRab29tIiwidGhhdCIsImV2ZW50IiwiYWRkTGlzdGVuZXIiLCJ6b29tIiwibWluWm9vbSIsIm1heFpvb20iLCJNYXRoIiwibWluIiwibWFwVHlwZXMiLCJnZXRNYXBUeXBlSWQiLCJtYXgiLCJyZXNldFZpZXdwb3J0IiwicmVkcmF3IiwibGVuZ3RoIiwiT2JqZWN0Iiwia2V5cyIsImFkZE1hcmtlcnMiLCJwcm90b3R5cGUiLCJvYmoxIiwib2JqMiIsIm9iamVjdCIsInByb3BlcnR5IiwiYXBwbHkiLCJvbkFkZCIsInNldFJlYWR5XyIsImRyYXciLCJpIiwic2l6ZSIsInB1c2giLCJ1cmwiLCJoZWlnaHQiLCJ3aWR0aCIsImZpdE1hcFRvTWFya2VycyIsIm1hcmtlcnMiLCJnZXRNYXJrZXJzIiwiYm91bmRzIiwiTGF0TG5nQm91bmRzIiwibWFya2VyIiwiZ2V0UG9zaXRpb24iLCJmaXRCb3VuZHMiLCJzZXRTdHlsZXMiLCJzdHlsZXMiLCJnZXRTdHlsZXMiLCJpc1pvb21PbkNsaWNrIiwiaXNBdmVyYWdlQ2VudGVyIiwiZ2V0VG90YWxNYXJrZXJzIiwic2V0TWF4Wm9vbSIsImdldE1heFpvb20iLCJjYWxjdWxhdG9yXyIsIm51bVN0eWxlcyIsImluZGV4IiwiY291bnQiLCJkdiIsInBhcnNlSW50IiwidGV4dCIsInNldENhbGN1bGF0b3IiLCJjYWxjdWxhdG9yIiwiZ2V0Q2FsY3VsYXRvciIsIm9wdF9ub2RyYXciLCJwdXNoTWFya2VyVG9fIiwiaXNBZGRlZCIsInJlcGFpbnQiLCJhZGRNYXJrZXIiLCJyZW1vdmVNYXJrZXJfIiwiaW5kZXhPZiIsIm0iLCJzcGxpY2UiLCJyZW1vdmVNYXJrZXIiLCJyZW1vdmVkIiwicmVtb3ZlTWFya2VycyIsIm1hcmtlcnNDb3B5Iiwic2xpY2UiLCJyIiwicmVhZHkiLCJjcmVhdGVDbHVzdGVyc18iLCJnZXRUb3RhbENsdXN0ZXJzIiwiZ2V0TWFwIiwiZ2V0R3JpZFNpemUiLCJzZXRHcmlkU2l6ZSIsImdldE1pbkNsdXN0ZXJTaXplIiwic2V0TWluQ2x1c3RlclNpemUiLCJnZXRFeHRlbmRlZEJvdW5kcyIsInByb2plY3Rpb24iLCJnZXRQcm9qZWN0aW9uIiwidHIiLCJMYXRMbmciLCJnZXROb3J0aEVhc3QiLCJsYXQiLCJsbmciLCJibCIsImdldFNvdXRoV2VzdCIsInRyUGl4IiwiZnJvbUxhdExuZ1RvRGl2UGl4ZWwiLCJ4IiwieSIsImJsUGl4IiwibmUiLCJmcm9tRGl2UGl4ZWxUb0xhdExuZyIsInN3IiwiaXNNYXJrZXJJbkJvdW5kc18iLCJjb250YWlucyIsImNsZWFyTWFya2VycyIsIm9wdF9oaWRlIiwiY2x1c3RlciIsInJlbW92ZSIsIm9sZENsdXN0ZXJzIiwid2luZG93Iiwic2V0VGltZW91dCIsImRpc3RhbmNlQmV0d2VlblBvaW50c18iLCJwMSIsInAyIiwiUiIsImRMYXQiLCJQSSIsImRMb24iLCJhIiwic2luIiwiY29zIiwiYyIsImF0YW4yIiwic3FydCIsImQiLCJhZGRUb0Nsb3Nlc3RDbHVzdGVyXyIsImRpc3RhbmNlIiwiY2x1c3RlclRvQWRkVG8iLCJwb3MiLCJjZW50ZXIiLCJnZXRDZW50ZXIiLCJpc01hcmtlckluQ2x1c3RlckJvdW5kcyIsIkNsdXN0ZXIiLCJtYXBCb3VuZHMiLCJnZXRCb3VuZHMiLCJtYXJrZXJDbHVzdGVyZXIiLCJtYXJrZXJDbHVzdGVyZXJfIiwiY2VudGVyXyIsImJvdW5kc18iLCJjbHVzdGVySWNvbl8iLCJDbHVzdGVySWNvbiIsImlzTWFya2VyQWxyZWFkeUFkZGVkIiwiY2FsY3VsYXRlQm91bmRzXyIsImwiLCJsZW4iLCJ1cGRhdGVJY29uIiwiZ2V0TWFya2VyQ2x1c3RlcmVyIiwiZ2V0U2l6ZSIsIm16IiwiaGlkZSIsInN1bXMiLCJzZXRDZW50ZXIiLCJzZXRTdW1zIiwic2hvdyIsIm9wdF9wYWRkaW5nIiwicGFkZGluZ18iLCJjbHVzdGVyXyIsImRpdl8iLCJzdW1zXyIsInZpc2libGVfIiwidHJpZ2dlckNsdXN0ZXJDbGljayIsInRyaWdnZXIiLCJkb2N1bWVudCIsImNyZWF0ZUVsZW1lbnQiLCJnZXRQb3NGcm9tTGF0TG5nXyIsInN0eWxlIiwiY3NzVGV4dCIsImNyZWF0ZUNzcyIsImlubmVySFRNTCIsInBhbmVzIiwiZ2V0UGFuZXMiLCJvdmVybGF5TW91c2VUYXJnZXQiLCJhcHBlbmRDaGlsZCIsImFkZERvbUxpc3RlbmVyIiwibGF0bG5nIiwid2lkdGhfIiwiaGVpZ2h0XyIsInRvcCIsImxlZnQiLCJ6SW5kZXgiLCJNYXJrZXIiLCJNQVhfWklOREVYIiwiZGlzcGxheSIsIm9uUmVtb3ZlIiwicGFyZW50Tm9kZSIsInJlbW92ZUNoaWxkIiwidGV4dF8iLCJpbmRleF8iLCJ1c2VTdHlsZSIsInVybF8iLCJ0ZXh0Q29sb3JfIiwiYW5jaG9yXyIsInRleHRTaXplXyIsImJhY2tncm91bmRQb3NpdGlvbl8iLCJiYWNrZ3JvdW5kUG9zaXRpb24iLCJ0eHRDb2xvciIsInR4dFNpemUiLCJqb2luIiwibyIsInJlc3VsdCIsIm5hbWUiLCJoYXNPd25Qcm9wZXJ0eSJdLCJtYXBw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QyxNQUFJQyxTQUFTLEVBQWI7QUFDQSxPQUFJLElBQUlDLElBQVIsSUFBZ0JGLENBQWhCLEVBQW1CO0FBQ2YsUUFBSUEsRUFBRUcsY0FBRixDQUFpQkQsSUFBakIsQ0FBSixFQUNFRCxPQUFPeEssSUFBUCxDQUFZeUssSUFBWjtBQUNMO0FBQ0QsU0FBT0QsTUFBUDtBQUNILENBUEQ7O0FBU0EsbUIiLCJmaWxlIjoicHVibGljL2dtYXAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKiBlc2xpbnQtZGlzYWJsZSAqL1xyXG4vLyA9PUNsb3N1cmVDb21waWxlcj09XHJcbi8vIEBjb21waWxhdGlvbl9sZXZlbCBBRFZBTkNFRF9PUFRJTUlaQVRJT05TXHJcbi8vIEBleHRlcm5zX3VybCBodHRwOi8vY2xvc3VyZS1jb21waWxlci5nb29nbGVjb2RlLmNvbS9zdm4vdHJ1bmsvY29udHJpYi9leHRlcm5zL21hcHMvZ29vZ2xlX21hcHNfYXBpX3YzXzMuanNcclxuLy8gPT0vQ2xvc3VyZUNvbXBpbGVyPT1cclxuXHJcbi8qKlxyXG4gKiBAbmFtZSBNYXJrZXJDbHVzdGVyZXIgZm9yIEdvb2dsZSBNYXBzIHYzXHJcbiAqIEB2ZXJzaW9uIHZlcnNpb24gMS4wLjFcclxuICogQGF1dGhvciBMdWtlIE1haGVcclxuICogQGZpbGVvdmVydmlld1xyXG4gKiBUaGUgbGlicmFyeSBjcmVhdGVzIGFuZCBtYW5hZ2VzIHBlci16b29tLWxldmVsIGNsdXN0ZXJzIGZvciBsYXJnZSBhbW91bnRzIG9mXHJcbiAqIG1hcmtlcnMuXHJcbiAqL1xyXG5cclxuLyoqXHJcbiAqIExpY2Vuc2VkIHVuZGVyIHRoZSBBcGFjaGUgTGljZW5zZSwgVmVyc2lvbiAyLjAgKHRoZSBcIkxpY2Vuc2VcIik7XHJcbiAqIHlvdSBtYXkgbm90IHVzZSB0aGlzIGZpbGUgZXhjZXB0IGluIGNvbXBsaWFuY2Ugd2l0aCB0aGUgTGljZW5zZS5cclxuICogWW91IG1heSBvYnRhaW4gYSBjb3B5IG9mIHRoZSBMaWNlbnNlIGF0XHJcbiAqXHJcbiAqICAgICBodHRwOi8vd3d3LmFwYWNoZS5vcmcvbGljZW5zZXMvTElDRU5TRS0yLjBcclxuICpcclxuICogVW5sZXNzIHJlcXVpcmVkIGJ5IGFwcGxpY2FibGUgbGF3IG9yIGFncmVlZCB0byBpbiB3cml0aW5nLCBzb2Z0d2FyZVxyXG4gKiBkaXN0cmlidXRlZCB1bmRlciB0aGUgTGljZW5zZSBpcyBkaXN0cmlidXRlZCBvbiBhbiBcIkFTIElTXCIgQkFTSVMsXHJcbiAqIFdJVEhPVVQgV0FSUkFOVElFUyBPUiBDT05ESVRJT05TIE9GIEFOWSBLSU5ELCBlaXRoZXIgZXhwcmVzcyBvciBpbXBsaWVkLlxyXG4gKiBTZWUgdGhlIExpY2Vuc2UgZm9yIHRoZSBzcGVjaWZpYyBsYW5ndWFnZSBnb3Zlcm5pbmcgcGVybWlzc2lvbnMgYW5kXHJcbiAqIGxpbWl0YXRpb25zIHVuZGVyIHRoZSBMaWNlbnNlLlxyXG4gKi9cclxuXHJcblxyXG4vKipcclxuICogQSBNYXJrZXIgQ2x1c3RlcmVyIHRoYXQgY2x1c3RlcnMgbWFya2Vycy5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5NYXB9IG1hcCBUaGUgR29vZ2xlIG1hcCB0byBhdHRhY2ggdG8uXHJcbiAqIEBwYXJhbSB7QXJyYXkuPGdvb2dsZS5tYXBzLk1hcmtlcj49fSBvcHRfbWFya2VycyBPcHRpb25hbCBtYXJrZXJzIHRvIGFkZCB0b1xyXG4gKiAgIHRoZSBjbHVzdGVyLlxyXG4gKiBAcGFyYW0ge09iamVjdD19IG9wdF9vcHRpb25zIHN1cHBvcnQgdGhlIGZvbGxvd2luZyBvcHRpb25zOlxyXG4gKiAgICAgJ2dyaWRTaXplJzogKG51bWJlcikgVGhlIGdyaWQgc2l6ZSBvZiBhIGNsdXN0ZXIgaW4gcGl4ZWxzLlxyXG4gKiAgICAgJ21heFpvb20nOiAobnVtYmVyKSBUaGUgbWF4aW11bSB6b29tIGxldmVsIHRoYXQgYSBtYXJrZXIgY2FuIGJlIHBhcnQgb2YgYVxyXG4gKiAgICAgICAgICAgICAgICBjbHVzdGVyLlxyXG4gKiAgICAgJ3pvb21PbkNsaWNrJzogKGJvb2xlYW4pIFdoZXRoZXIgdGhlIGRlZmF1bHQgYmVoYXZpb3VyIG9mIGNsaWNraW5nIG9uIGFcclxuICogICAgICAgICAgICAgICAgICAgIGNsdXN0ZXIgaXMgdG8gem9vbSBpbnRvIGl0LlxyXG4gKiAgICAgJ2ltYWdlUGF0aCc6IChzdHJpbmcpIFRoZSBiYXNlIFVSTCB3aGVyZSB0aGUgaW1hZ2VzIHJlcHJlc2VudGluZ1xyXG4gKiAgICAgICAgICAgICAgICAgIGNsdXN0ZXJzIHdpbGwgYmUgZm91bmQuIFRoZSBmdWxsIFVSTCB3aWxsIGJlOlxyXG4gKiAgICAgICAgICAgICAgICAgIHtpbWFnZVBhdGh9WzEtNV0ue2ltYWdlRXh0ZW5zaW9ufVxyXG4gKiAgICAgICAgICAgICAgICAgIERlZmF1bHQ6ICcuLi9pbWFnZXMvbScuXHJcbiAqICAgICAnaW1hZ2VFeHRlbnNpb24nOiAoc3RyaW5nKSBUaGUgc3VmZml4IGZvciBpbWFnZXMgVVJMIHJlcHJlc2VudGluZ1xyXG4gKiAgICAgICAgICAgICAgICAgICAgICAgY2x1c3RlcnMgd2lsbCBiZSBmb3VuZC4gU2VlIF9pbWFnZVBhdGhfIGZvciBkZXRhaWxzLlxyXG4gKiAgICAgICAgICAgICAgICAgICAgICAgRGVmYXVsdDogJ3BuZycuXHJcbiAqICAgICAnYXZlcmFnZUNlbnRlcic6IChib29sZWFuKSBXaGV0aGVyIHRoZSBjZW50ZXIgb2YgZWFjaCBjbHVzdGVyIHNob3VsZCBiZVxyXG4gKiAgICAgICAgICAgICAgICAgICAgICB0aGUgYXZlcmFnZSBvZiBhbGwgbWFya2VycyBpbiB0aGUgY2x1c3Rlci5cclxuICogICAgICdtaW5pbXVtQ2x1c3RlclNpemUnOiAobnVtYmVyKSBUaGUgbWluaW11bSBudW1iZXIgb2YgbWFya2VycyB0byBiZSBpbiBhXHJcbiAqICAgICAgICAgICAgICAgICAgICAgICAgICAgY2x1c3RlciBiZWZvcmUgdGhlIG1hcmtlcnMgYXJlIGhpZGRlbiBhbmQgYSBjb3VudFxyXG4gKiAgICAgICAgICAgICAgICAgICAgICAgICAgIGlzIHNob3duLlxyXG4gKiAgICAgJ3N0eWxlcyc6IChvYmplY3QpIEFuIG9iamVjdCB0aGF0IGhhcyBzdHlsZSBwcm9wZXJ0aWVzOlxyXG4gKiAgICAgICAndXJsJzogKHN0cmluZykgVGhlIGltYWdlIHVybC5cclxuICogICAgICAgJ2hlaWdodCc6IChudW1iZXIpIFRoZSBpbWFnZSBoZWlnaHQuXHJcbiAqICAgICAgICd3aWR0aCc6IChudW1iZXIpIFRoZSBpbWFnZSB3aWR0aC5cclxuICogICAgICAgJ2FuY2hvcic6IChBcnJheSkgVGhlIGFuY2hvciBwb3NpdGlvbiBvZiB0aGUgbGFiZWwgdGV4dC5cclxuICogICAgICAgJ3RleHRDb2xvcic6IChzdHJpbmcpIFRoZSB0ZXh0IGNvbG9yLlxyXG4gKiAgICAgICAndGV4dFNpemUnOiAobnVtYmVyKSBUaGUgdGV4dCBzaXplLlxyXG4gKiAgICAgICAnYmFja2dyb3VuZFBvc2l0aW9uJzogKHN0cmluZykgVGhlIHBvc2l0aW9uIG9mIHRoZSBiYWNrZ291bmQgeCwgeS5cclxuICogQGNvbnN0cnVjdG9yXHJcbiAqIEBleHRlbmRzIGdvb2dsZS5tYXBzLk92ZXJsYXlWaWV3XHJcbiAqL1xyXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBNYXJrZXJDbHVzdGVyZXIobWFwLCBvcHRfbWFya2Vycywgb3B0X29wdGlvbnMpIHtcclxuICAvLyBNYXJrZXJDbHVzdGVyZXIgaW1wbGVtZW50cyBnb29nbGUubWFwcy5PdmVybGF5VmlldyBpbnRlcmZhY2UuIFdlIHVzZSB0aGVcclxuICAvLyBleHRlbmQgZnVuY3Rpb24gdG8gZXh0ZW5kIE1hcmtlckNsdXN0ZXJlciB3aXRoIGdvb2dsZS5tYXBzLk92ZXJsYXlWaWV3XHJcbiAgLy8gYmVjYXVzZSBpdCBtaWdodCBub3QgYWx3YXlzIGJlIGF2YWlsYWJsZSB3aGVuIHRoZSBjb2RlIGlzIGRlZmluZWQgc28gd2VcclxuICAvLyBsb29rIGZvciBpdCBhdCB0aGUgbGFzdCBwb3NzaWJsZSBtb21lbnQuIElmIGl0IGRvZXNuJ3QgZXhpc3Qgbm93IHRoZW5cclxuICAvLyB0aGVyZSBpcyBubyBwb2ludCBnb2luZyBhaGVhZCA6KVxyXG4gIHRoaXMuZXh0ZW5kKE1hcmtlckNsdXN0ZXJlciwgZ29vZ2xlLm1hcHMuT3ZlcmxheVZpZXcpO1xyXG4gIHRoaXMubWFwXyA9IG1hcDtcclxuXHJcbiAgLyoqXHJcbiAgICogQHR5cGUge0FycmF5Ljxnb29nbGUubWFwcy5NYXJrZXI+fVxyXG4gICAqIEBwcml2YXRlXHJcbiAgICovXHJcbiAgdGhpcy5tYXJrZXJzXyA9IFtdO1xyXG5cclxuICAvKipcclxuICAgKiAgQHR5cGUge0FycmF5LjxDbHVzdGVyPn1cclxuICAgKi9cclxuICB0aGlzLmNsdXN0ZXJzXyA9IFtdO1xyXG5cclxuICB0aGlzLnNpemVzID0gWzUzLCA1NiwgNjYsIDc4LCA5MF07XHJcblxyXG4gIC8qKlxyXG4gICAqIEBwcml2YXRlXHJcbiAgICovXHJcbiAgdGhpcy5zdHlsZXNfID0gW107XHJcblxyXG4gIC8qKlxyXG4gICAqIEB0eXBlIHtib29sZWFufVxyXG4gICAqIEBwcml2YXRlXHJcbiAgICovXHJcbiAgdGhpcy5yZWFkeV8gPSBmYWxzZTtcclxuXHJcbiAgdmFyIG9wdGlvbnMgPSBvcHRfb3B0aW9ucyB8fCB7fTtcclxuXHJcbiAgLyoqXHJcbiAgICogQHR5cGUge251bWJlcn1cclxuICAgKiBAcHJpdmF0ZVxyXG4gICAqL1xyXG4gIHRoaXMuZ3JpZFNpemVfID0gb3B0aW9uc1snZ3JpZFNpemUnXSB8fCA2MDtcclxuXHJcbiAgLyoqXHJcbiAgICogQHByaXZhdGVcclxuICAgKi9cclxuICB0aGlzLm1pbkNsdXN0ZXJTaXplXyA9IG9wdGlvbnNbJ21pbmltdW1DbHVzdGVyU2l6ZSddIHx8IDI7XHJcblxyXG5cclxuICAvKipcclxuICAgKiBAdHlwZSB7P251bWJlcn1cclxuICAgKiBAcHJpdmF0ZVxyXG4gICAqL1xyXG4gIHRoaXMubWF4Wm9vbV8gPSBvcHRpb25zWydtYXhab29tJ10gfHwgbnVsbDtcclxuXHJcbiAgdGhpcy5zdHlsZXNfID0gb3B0aW9uc1snc3R5bGVzJ10gfHwgW107XHJcblxyXG4gIC8qKlxyXG4gICAqIEB0eXBlIHtzdHJpbmd9XHJcbiAgICogQHByaXZhdGVcclxuICAgKi9cclxuICB0aGlzLmltYWdlUGF0aF8gPSBvcHRpb25zWydpbWFnZVBhdGgnXSB8fFxyXG4gICAgICB0aGlzLk1BUktFUl9DTFVTVEVSX0lNQUdFX1BBVEhfO1xyXG5cclxuICAvKipcclxuICAgKiBAdHlwZSB7c3RyaW5nfVxyXG4gICAqIEBwcml2YXRlXHJcbiAgICovXHJcbiAgdGhpcy5pbWFnZUV4dGVuc2lvbl8gPSBvcHRpb25zWydpbWFnZUV4dGVuc2lvbiddIHx8XHJcbiAgICAgIHRoaXMuTUFSS0VSX0NMVVNURVJfSU1BR0VfRVhURU5TSU9OXztcclxuXHJcbiAgLyoqXHJcbiAgICogQHR5cGUge2Jvb2xlYW59XHJcbiAgICogQHByaXZhdGVcclxuICAgKi9cclxuICB0aGlzLnpvb21PbkNsaWNrXyA9IHRydWU7XHJcblxyXG4gIGlmIChvcHRpb25zWyd6b29tT25DbGljayddICE9IHVuZGVmaW5lZCkge1xyXG4gICAgdGhpcy56b29tT25DbGlja18gPSBvcHRpb25zWyd6b29tT25DbGljayddO1xyXG4gIH1cclxuXHJcbiAgLyoqXHJcbiAgICogQHR5cGUge2Jvb2xlYW59XHJcbiAgICogQHByaXZhdGVcclxuICAgKi9cclxuICB0aGlzLmF2ZXJhZ2VDZW50ZXJfID0gZmFsc2U7XHJcblxyXG4gIGlmIChvcHRpb25zWydhdmVyYWdlQ2VudGVyJ10gIT0gdW5kZWZpbmVkKSB7XHJcbiAgICB0aGlzLmF2ZXJhZ2VDZW50ZXJfID0gb3B0aW9uc1snYXZlcmFnZUNlbnRlciddO1xyXG4gIH1cclxuXHJcbiAgdGhpcy5zZXR1cFN0eWxlc18oKTtcclxuXHJcbiAgdGhpcy5zZXRNYXAobWFwKTtcclxuXHJcbiAgLyoqXHJcbiAgICogQHR5cGUge251bWJlcn1cclxuICAgKiBAcHJpdmF0ZVxyXG4gICAqL1xyXG4gIHRoaXMucHJldlpvb21fID0gdGhpcy5tYXBfLmdldFpvb20oKTtcclxuXHJcbiAgLy8gQWRkIHRoZSBtYXAgZXZlbnQgbGlzdGVuZXJzXHJcbiAgdmFyIHRoYXQgPSB0aGlzO1xyXG4gIGdvb2dsZS5tYXBzLmV2ZW50LmFkZExpc3RlbmVyKHRoaXMubWFwXywgJ3pvb21fY2hhbmdlZCcsIGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gRGV0ZXJtaW5lcyBtYXAgdHlwZSBhbmQgcHJldmVudCBpbGxlZ2FsIHpvb20gbGV2ZWxzXHJcbiAgICB2YXIgem9vbSA9IHRoYXQubWFwXy5nZXRab29tKCk7XHJcbiAgICB2YXIgbWluWm9vbSA9IHRoYXQubWFwXy5taW5ab29tIHx8IDA7XHJcbiAgICB2YXIgbWF4Wm9vbSA9IE1hdGgubWluKHRoYXQubWFwXy5tYXhab29tIHx8IDEwMCxcclxuICAgICAgICAgICAgICAgICAgICAgICAgIHRoYXQubWFwXy5tYXBUeXBlc1t0aGF0Lm1hcF8uZ2V0TWFwVHlwZUlkKCldLm1heFpvb20pO1xyXG4gICAgem9vbSA9IE1hdGgubWluKE1hdGgubWF4KHpvb20sbWluWm9vbSksbWF4Wm9vbSk7XHJcblxyXG4gICAgaWYgKHRoYXQucHJldlpvb21fICE9IHpvb20pIHtcclxuICAgICAgdGhhdC5wcmV2Wm9vbV8gPSB6b29tO1xyXG4gICAgICB0aGF0LnJlc2V0Vmlld3BvcnQoKTtcclxuICAgIH1cclxuICB9KTtcclxuXHJcbiAgZ29vZ2xlLm1hcHMuZXZlbnQuYWRkTGlzdGVuZXIodGhpcy5tYXBfLCAnaWRsZScsIGZ1bmN0aW9uKCkge1xyXG4gICAgdGhhdC5yZWRyYXcoKTtcclxuICB9KTtcclxuXHJcbiAgLy8gRmluYWxseSwgYWRkIHRoZSBtYXJrZXJzXHJcbiAgaWYgKG9wdF9tYXJrZXJzICYmIChvcHRfbWFya2Vycy5sZW5ndGggfHwgT2JqZWN0LmtleXMob3B0X21hcmtlcnMpLmxlbmd0aCkpIHtcclxuICAgIHRoaXMuYWRkTWFya2VycyhvcHRfbWFya2VycywgZmFsc2UpO1xyXG4gIH1cclxufVxyXG5cclxuXHJcbi8qKlxyXG4gKiBUaGUgbWFya2VyIGNsdXN0ZXIgaW1hZ2UgcGF0aC5cclxuICpcclxuICogQHR5cGUge3N0cmluZ31cclxuICogQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuTUFSS0VSX0NMVVNURVJfSU1BR0VfUEFUSF8gPSAnLi4vaW1hZ2VzL20nO1xyXG5cclxuXHJcbi8qKlxyXG4gKiBUaGUgbWFya2VyIGNsdXN0ZXIgaW1hZ2UgcGF0aC5cclxuICpcclxuICogQHR5cGUge3N0cmluZ31cclxuICogQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuTUFSS0VSX0NMVVNURVJfSU1BR0VfRVhURU5TSU9OXyA9ICdwbmcnO1xyXG5cclxuXHJcbi8qKlxyXG4gKiBFeHRlbmRzIGEgb2JqZWN0cyBwcm90b3R5cGUgYnkgYW5vdGhlcnMuXHJcbiAqXHJcbiAqIEBwYXJhbSB7T2JqZWN0fSBvYmoxIFRoZSBvYmplY3QgdG8gYmUgZXh0ZW5kZWQuXHJcbiAqIEBwYXJhbSB7T2JqZWN0fSBvYmoyIFRoZSBvYmplY3QgdG8gZXh0ZW5kIHdpdGguXHJcbiAqIEByZXR1cm4ge09iamVjdH0gVGhlIG5ldyBleHRlbmRlZCBvYmplY3QuXHJcbiAqIEBpZ25vcmVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZXh0ZW5kID0gZnVuY3Rpb24ob2JqMSwgb2JqMikge1xyXG4gIHJldHVybiAoZnVuY3Rpb24ob2JqZWN0KSB7XHJcbiAgICBmb3IgKHZhciBwcm9wZXJ0eSBpbiBvYmplY3QucHJvdG90eXBlKSB7XHJcbiAgICAgIHRoaXMucHJvdG90eXBlW3Byb3BlcnR5XSA9IG9iamVjdC5wcm90b3R5cGVbcHJvcGVydHldO1xyXG4gICAgfVxyXG4gICAgcmV0dXJuIHRoaXM7XHJcbiAgfSkuYXBwbHkob2JqMSwgW29iajJdKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogSW1wbGVtZW50YWlvbiBvZiB0aGUgaW50ZXJmYWNlIG1ldGhvZC5cclxuICogQGlnbm9yZVxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5vbkFkZCA9IGZ1bmN0aW9uKCkge1xyXG4gIHRoaXMuc2V0UmVhZHlfKHRydWUpO1xyXG59O1xyXG5cclxuLyoqXHJcbiAqIEltcGxlbWVudGFpb24gb2YgdGhlIGludGVyZmFjZSBtZXRob2QuXHJcbiAqIEBpZ25vcmVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZHJhdyA9IGZ1bmN0aW9uKCkge307XHJcblxyXG4vKipcclxuICogU2V0cyB1cCB0aGUgc3R5bGVzIG9iamVjdC5cclxuICpcclxuICogQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuc2V0dXBTdHlsZXNfID0gZnVuY3Rpb24oKSB7XHJcbiAgaWYgKHRoaXMuc3R5bGVzXy5sZW5ndGgpIHtcclxuICAgIHJldHVybjtcclxuICB9XHJcblxyXG4gIGZvciAodmFyIGkgPSAwLCBzaXplOyBzaXplID0gdGhpcy5zaXplc1tpXTsgaSsrKSB7XHJcbiAgICB0aGlzLnN0eWxlc18ucHVzaCh7XHJcbiAgICAgIHVybDogdGhpcy5pbWFnZVBhdGhfICsgKGkgKyAxKSArICcuJyArIHRoaXMuaW1hZ2VFeHRlbnNpb25fLFxyXG4gICAgICBoZWlnaHQ6IHNpemUsXHJcbiAgICAgIHdpZHRoOiBzaXplXHJcbiAgICB9KTtcclxuICB9XHJcbn07XHJcblxyXG4vKipcclxuICogIEZpdCB0aGUgbWFwIHRvIHRoZSBib3VuZHMgb2YgdGhlIG1hcmtlcnMgaW4gdGhlIGNsdXN0ZXJlci5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZml0TWFwVG9NYXJrZXJzID0gZnVuY3Rpb24oKSB7XHJcbiAgdmFyIG1hcmtlcnMgPSB0aGlzLmdldE1hcmtlcnMoKTtcclxuICB2YXIgYm91bmRzID0gbmV3IGdvb2dsZS5tYXBzLkxhdExuZ0JvdW5kcygpO1xyXG4gIGZvciAodmFyIGkgPSAwLCBtYXJrZXI7IG1hcmtlciA9IG1hcmtlcnNbaV07IGkrKykge1xyXG4gICAgYm91bmRzLmV4dGVuZChtYXJrZXIuZ2V0UG9zaXRpb24oKSk7XHJcbiAgfVxyXG5cclxuICB0aGlzLm1hcF8uZml0Qm91bmRzKGJvdW5kcyk7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqICBTZXRzIHRoZSBzdHlsZXMuXHJcbiAqXHJcbiAqICBAcGFyYW0ge09iamVjdH0gc3R5bGVzIFRoZSBzdHlsZSB0byBzZXQuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldFN0eWxlcyA9IGZ1bmN0aW9uKHN0eWxlcykge1xyXG4gIHRoaXMuc3R5bGVzXyA9IHN0eWxlcztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogIEdldHMgdGhlIHN0eWxlcy5cclxuICpcclxuICogIEByZXR1cm4ge09iamVjdH0gVGhlIHN0eWxlcyBvYmplY3QuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmdldFN0eWxlcyA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLnN0eWxlc187XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFdoZXRoZXIgem9vbSBvbiBjbGljayBpcyBzZXQuXHJcbiAqXHJcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFRydWUgaWYgem9vbU9uQ2xpY2tfIGlzIHNldC5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuaXNab29tT25DbGljayA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLnpvb21PbkNsaWNrXztcclxufTtcclxuXHJcbi8qKlxyXG4gKiBXaGV0aGVyIGF2ZXJhZ2UgY2VudGVyIGlzIHNldC5cclxuICpcclxuICogQHJldHVybiB7Ym9vbGVhbn0gVHJ1ZSBpZiBhdmVyYWdlQ2VudGVyXyBpcyBzZXQuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmlzQXZlcmFnZUNlbnRlciA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLmF2ZXJhZ2VDZW50ZXJfO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiAgUmV0dXJucyB0aGUgYXJyYXkgb2YgbWFya2VycyBpbiB0aGUgY2x1c3RlcmVyLlxyXG4gKlxyXG4gKiAgQHJldHVybiB7QXJyYXkuPGdvb2dsZS5tYXBzLk1hcmtlcj59IFRoZSBtYXJrZXJzLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRNYXJrZXJzID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWFya2Vyc187XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqICBSZXR1cm5zIHRoZSBudW1iZXIgb2YgbWFya2VycyBpbiB0aGUgY2x1c3RlcmVyXHJcbiAqXHJcbiAqICBAcmV0dXJuIHtOdW1iZXJ9IFRoZSBudW1iZXIgb2YgbWFya2Vycy5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0VG90YWxNYXJrZXJzID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWFya2Vyc18ubGVuZ3RoO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiAgU2V0cyB0aGUgbWF4IHpvb20gZm9yIHRoZSBjbHVzdGVyZXIuXHJcbiAqXHJcbiAqICBAcGFyYW0ge251bWJlcn0gbWF4Wm9vbSBUaGUgbWF4IHpvb20gbGV2ZWwuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldE1heFpvb20gPSBmdW5jdGlvbihtYXhab29tKSB7XHJcbiAgdGhpcy5tYXhab29tXyA9IG1heFpvb207XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqICBHZXRzIHRoZSBtYXggem9vbSBmb3IgdGhlIGNsdXN0ZXJlci5cclxuICpcclxuICogIEByZXR1cm4ge251bWJlcn0gVGhlIG1heCB6b29tIGxldmVsLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRNYXhab29tID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWF4Wm9vbV87XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqICBUaGUgZnVuY3Rpb24gZm9yIGNhbGN1bGF0aW5nIHRoZSBjbHVzdGVyIGljb24gaW1hZ2UuXHJcbiAqXHJcbiAqICBAcGFyYW0ge0FycmF5Ljxnb29nbGUubWFwcy5NYXJrZXI+fSBtYXJrZXJzIFRoZSBtYXJrZXJzIGluIHRoZSBjbHVzdGVyZXIuXHJcbiAqICBAcGFyYW0ge251bWJlcn0gbnVtU3R5bGVzIFRoZSBudW1iZXIgb2Ygc3R5bGVzIGF2YWlsYWJsZS5cclxuICogIEByZXR1cm4ge09iamVjdH0gQSBvYmplY3QgcHJvcGVydGllczogJ3RleHQnIChzdHJpbmcpIGFuZCAnaW5kZXgnIChudW1iZXIpLlxyXG4gKiAgQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuY2FsY3VsYXRvcl8gPSBmdW5jdGlvbihtYXJrZXJzLCBudW1TdHlsZXMpIHtcclxuICB2YXIgaW5kZXggPSAwO1xyXG4gIHZhciBjb3VudCA9IG1hcmtlcnMubGVuZ3RoO1xyXG4gIHZhciBkdiA9IGNvdW50O1xyXG4gIHdoaWxlIChkdiAhPT0gMCkge1xyXG4gICAgZHYgPSBwYXJzZUludChkdiAvIDEwLCAxMCk7XHJcbiAgICBpbmRleCsrO1xyXG4gIH1cclxuXHJcbiAgaW5kZXggPSBNYXRoLm1pbihpbmRleCwgbnVtU3R5bGVzKTtcclxuICByZXR1cm4ge1xyXG4gICAgdGV4dDogY291bnQsXHJcbiAgICBpbmRleDogaW5kZXhcclxuICB9O1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBTZXQgdGhlIGNhbGN1bGF0b3IgZnVuY3Rpb24uXHJcbiAqXHJcbiAqIEBwYXJhbSB7ZnVuY3Rpb24oQXJyYXksIG51bWJlcil9IGNhbGN1bGF0b3IgVGhlIGZ1bmN0aW9uIHRvIHNldCBhcyB0aGVcclxuICogICAgIGNhbGN1bGF0b3IuIFRoZSBmdW5jdGlvbiBzaG91bGQgcmV0dXJuIGEgb2JqZWN0IHByb3BlcnRpZXM6XHJcbiAqICAgICAndGV4dCcgKHN0cmluZykgYW5kICdpbmRleCcgKG51bWJlcikuXHJcbiAqXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldENhbGN1bGF0b3IgPSBmdW5jdGlvbihjYWxjdWxhdG9yKSB7XHJcbiAgdGhpcy5jYWxjdWxhdG9yXyA9IGNhbGN1bGF0b3I7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIEdldCB0aGUgY2FsY3VsYXRvciBmdW5jdGlvbi5cclxuICpcclxuICogQHJldHVybiB7ZnVuY3Rpb24oQXJyYXksIG51bWJlcil9IHRoZSBjYWxjdWxhdG9yIGZ1bmN0aW9uLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRDYWxjdWxhdG9yID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMuY2FsY3VsYXRvcl87XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIEFkZCBhbiBhcnJheSBvZiBtYXJrZXJzIHRvIHRoZSBjbHVzdGVyZXIuXHJcbiAqXHJcbiAqIEBwYXJhbSB7QXJyYXkuPGdvb2dsZS5tYXBzLk1hcmtlcj59IG1hcmtlcnMgVGhlIG1hcmtlcnMgdG8gYWRkLlxyXG4gKiBAcGFyYW0ge2Jvb2xlYW49fSBvcHRfbm9kcmF3IFdoZXRoZXIgdG8gcmVkcmF3IHRoZSBjbHVzdGVycy5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuYWRkTWFya2VycyA9IGZ1bmN0aW9uKG1hcmtlcnMsIG9wdF9ub2RyYXcpIHtcclxuICBpZiAobWFya2Vycy5sZW5ndGgpIHtcclxuICAgIGZvciAodmFyIGkgPSAwLCBtYXJrZXI7IG1hcmtlciA9IG1hcmtlcnNbaV07IGkrKykge1xyXG4gICAgICB0aGlzLnB1c2hNYXJrZXJUb18obWFya2VyKTtcclxuICAgIH1cclxuICB9IGVsc2UgaWYgKE9iamVjdC5rZXlzKG1hcmtlcnMpLmxlbmd0aCkge1xyXG4gICAgZm9yICh2YXIgbWFya2VyIGluIG1hcmtlcnMpIHtcclxuICAgICAgdGhpcy5wdXNoTWFya2VyVG9fKG1hcmtlcnNbbWFya2VyXSk7XHJcbiAgICB9XHJcbiAgfVxyXG4gIGlmICghb3B0X25vZHJhdykge1xyXG4gICAgdGhpcy5yZWRyYXcoKTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFB1c2hlcyBhIG1hcmtlciB0byB0aGUgY2x1c3RlcmVyLlxyXG4gKlxyXG4gKiBAcGFyYW0ge2dvb2dsZS5tYXBzLk1hcmtlcn0gbWFya2VyIFRoZSBtYXJrZXIgdG8gYWRkLlxyXG4gKiBAcHJpdmF0ZVxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5wdXNoTWFya2VyVG9fID0gZnVuY3Rpb24obWFya2VyKSB7XHJcbiAgbWFya2VyLmlzQWRkZWQgPSBmYWxzZTtcclxuICBpZiAobWFya2VyWydkcmFnZ2FibGUnXSkge1xyXG4gICAgLy8gSWYgdGhlIG1hcmtlciBpcyBkcmFnZ2FibGUgYWRkIGEgbGlzdGVuZXIgc28gd2UgdXBkYXRlIHRoZSBjbHVzdGVycyBvblxyXG4gICAgLy8gdGhlIGRyYWcgZW5kLlxyXG4gICAgdmFyIHRoYXQgPSB0aGlzO1xyXG4gICAgZ29vZ2xlLm1hcHMuZXZlbnQuYWRkTGlzdGVuZXIobWFya2VyLCAnZHJhZ2VuZCcsIGZ1bmN0aW9uKCkge1xyXG4gICAgICBtYXJrZXIuaXNBZGRlZCA9IGZhbHNlO1xyXG4gICAgICB0aGF0LnJlcGFpbnQoKTtcclxuICAgIH0pO1xyXG4gIH1cclxuICB0aGlzLm1hcmtlcnNfLnB1c2gobWFya2VyKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogQWRkcyBhIG1hcmtlciB0byB0aGUgY2x1c3RlcmVyIGFuZCByZWRyYXdzIGlmIG5lZWRlZC5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5NYXJrZXJ9IG1hcmtlciBUaGUgbWFya2VyIHRvIGFkZC5cclxuICogQHBhcmFtIHtib29sZWFuPX0gb3B0X25vZHJhdyBXaGV0aGVyIHRvIHJlZHJhdyB0aGUgY2x1c3RlcnMuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmFkZE1hcmtlciA9IGZ1bmN0aW9uKG1hcmtlciwgb3B0X25vZHJhdykge1xyXG4gIHRoaXMucHVzaE1hcmtlclRvXyhtYXJrZXIpO1xyXG4gIGlmICghb3B0X25vZHJhdykge1xyXG4gICAgdGhpcy5yZWRyYXcoKTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJlbW92ZXMgYSBtYXJrZXIgYW5kIHJldHVybnMgdHJ1ZSBpZiByZW1vdmVkLCBmYWxzZSBpZiBub3RcclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5NYXJrZXJ9IG1hcmtlciBUaGUgbWFya2VyIHRvIHJlbW92ZVxyXG4gKiBAcmV0dXJuIHtib29sZWFufSBXaGV0aGVyIHRoZSBtYXJrZXIgd2FzIHJlbW92ZWQgb3Igbm90XHJcbiAqIEBwcml2YXRlXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlbW92ZU1hcmtlcl8gPSBmdW5jdGlvbihtYXJrZXIpIHtcclxuICB2YXIgaW5kZXggPSAtMTtcclxuICBpZiAodGhpcy5tYXJrZXJzXy5pbmRleE9mKSB7XHJcbiAgICBpbmRleCA9IHRoaXMubWFya2Vyc18uaW5kZXhPZihtYXJrZXIpO1xyXG4gIH0gZWxzZSB7XHJcbiAgICBmb3IgKHZhciBpID0gMCwgbTsgbSA9IHRoaXMubWFya2Vyc19baV07IGkrKykge1xyXG4gICAgICBpZiAobSA9PSBtYXJrZXIpIHtcclxuICAgICAgICBpbmRleCA9IGk7XHJcbiAgICAgICAgYnJlYWs7XHJcbiAgICAgIH1cclxuICAgIH1cclxuICB9XHJcblxyXG4gIGlmIChpbmRleCA9PSAtMSkge1xyXG4gICAgLy8gTWFya2VyIGlzIG5vdCBpbiBvdXIgbGlzdCBvZiBtYXJrZXJzLlxyXG4gICAgcmV0dXJuIGZhbHNlO1xyXG4gIH1cclxuXHJcbiAgbWFya2VyLnNldE1hcChudWxsKTtcclxuXHJcbiAgdGhpcy5tYXJrZXJzXy5zcGxpY2UoaW5kZXgsIDEpO1xyXG5cclxuICByZXR1cm4gdHJ1ZTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmVtb3ZlIGEgbWFya2VyIGZyb20gdGhlIGNsdXN0ZXIuXHJcbiAqXHJcbiAqIEBwYXJhbSB7Z29vZ2xlLm1hcHMuTWFya2VyfSBtYXJrZXIgVGhlIG1hcmtlciB0byByZW1vdmUuXHJcbiAqIEBwYXJhbSB7Ym9vbGVhbj19IG9wdF9ub2RyYXcgT3B0aW9uYWwgYm9vbGVhbiB0byBmb3JjZSBubyByZWRyYXcuXHJcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFRydWUgaWYgdGhlIG1hcmtlciB3YXMgcmVtb3ZlZC5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUucmVtb3ZlTWFya2VyID0gZnVuY3Rpb24obWFya2VyLCBvcHRfbm9kcmF3KSB7XHJcbiAgdmFyIHJlbW92ZWQgPSB0aGlzLnJlbW92ZU1hcmtlcl8obWFya2VyKTtcclxuXHJcbiAgaWYgKCFvcHRfbm9kcmF3ICYmIHJlbW92ZWQpIHtcclxuICAgIHRoaXMucmVzZXRWaWV3cG9ydCgpO1xyXG4gICAgdGhpcy5yZWRyYXcoKTtcclxuICAgIHJldHVybiB0cnVlO1xyXG4gIH0gZWxzZSB7XHJcbiAgIHJldHVybiBmYWxzZTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJlbW92ZXMgYW4gYXJyYXkgb2YgbWFya2VycyBmcm9tIHRoZSBjbHVzdGVyLlxyXG4gKlxyXG4gKiBAcGFyYW0ge0FycmF5Ljxnb29nbGUubWFwcy5NYXJrZXI+fSBtYXJrZXJzIFRoZSBtYXJrZXJzIHRvIHJlbW92ZS5cclxuICogQHBhcmFtIHtib29sZWFuPX0gb3B0X25vZHJhdyBPcHRpb25hbCBib29sZWFuIHRvIGZvcmNlIG5vIHJlZHJhdy5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUucmVtb3ZlTWFya2VycyA9IGZ1bmN0aW9uKG1hcmtlcnMsIG9wdF9ub2RyYXcpIHtcclxuICAvLyBjcmVhdGUgYSBsb2NhbCBjb3B5IG9mIG1hcmtlcnMgaWYgcmVxdWlyZWRcclxuICAvLyAocmVtb3ZlTWFya2VyXyBtb2RpZmllcyB0aGUgZ2V0TWFya2VycygpIGFycmF5IGluIHBsYWNlKVxyXG4gIHZhciBtYXJrZXJzQ29weSA9IG1hcmtlcnMgPT09IHRoaXMuZ2V0TWFya2VycygpID8gbWFya2Vycy5zbGljZSgpIDogbWFya2VycztcclxuICB2YXIgcmVtb3ZlZCA9IGZhbHNlO1xyXG5cclxuICBmb3IgKHZhciBpID0gMCwgbWFya2VyOyBtYXJrZXIgPSBtYXJrZXJzQ29weVtpXTsgaSsrKSB7XHJcbiAgICB2YXIgciA9IHRoaXMucmVtb3ZlTWFya2VyXyhtYXJrZXIpO1xyXG4gICAgcmVtb3ZlZCA9IHJlbW92ZWQgfHwgcjtcclxuICB9XHJcblxyXG4gIGlmICghb3B0X25vZHJhdyAmJiByZW1vdmVkKSB7XHJcbiAgICB0aGlzLnJlc2V0Vmlld3BvcnQoKTtcclxuICAgIHRoaXMucmVkcmF3KCk7XHJcbiAgICByZXR1cm4gdHJ1ZTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFNldHMgdGhlIGNsdXN0ZXJlcidzIHJlYWR5IHN0YXRlLlxyXG4gKlxyXG4gKiBAcGFyYW0ge2Jvb2xlYW59IHJlYWR5IFRoZSBzdGF0ZS5cclxuICogQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuc2V0UmVhZHlfID0gZnVuY3Rpb24ocmVhZHkpIHtcclxuICBpZiAoIXRoaXMucmVhZHlfKSB7XHJcbiAgICB0aGlzLnJlYWR5XyA9IHJlYWR5O1xyXG4gICAgdGhpcy5jcmVhdGVDbHVzdGVyc18oKTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJldHVybnMgdGhlIG51bWJlciBvZiBjbHVzdGVycyBpbiB0aGUgY2x1c3RlcmVyLlxyXG4gKlxyXG4gKiBAcmV0dXJuIHtudW1iZXJ9IFRoZSBudW1iZXIgb2YgY2x1c3RlcnMuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmdldFRvdGFsQ2x1c3RlcnMgPSBmdW5jdGlvbigpIHtcclxuICByZXR1cm4gdGhpcy5jbHVzdGVyc18ubGVuZ3RoO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBSZXR1cm5zIHRoZSBnb29nbGUgbWFwIHRoYXQgdGhlIGNsdXN0ZXJlciBpcyBhc3NvY2lhdGVkIHdpdGguXHJcbiAqXHJcbiAqIEByZXR1cm4ge2dvb2dsZS5tYXBzLk1hcH0gVGhlIG1hcC5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0TWFwID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWFwXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogU2V0cyB0aGUgZ29vZ2xlIG1hcCB0aGF0IHRoZSBjbHVzdGVyZXIgaXMgYXNzb2NpYXRlZCB3aXRoLlxyXG4gKlxyXG4gKiBAcGFyYW0ge2dvb2dsZS5tYXBzLk1hcH0gbWFwIFRoZSBtYXAuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldE1hcCA9IGZ1bmN0aW9uKG1hcCkge1xyXG4gIHRoaXMubWFwXyA9IG1hcDtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyB0aGUgc2l6ZSBvZiB0aGUgZ3JpZC5cclxuICpcclxuICogQHJldHVybiB7bnVtYmVyfSBUaGUgZ3JpZCBzaXplLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRHcmlkU2l6ZSA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLmdyaWRTaXplXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogU2V0cyB0aGUgc2l6ZSBvZiB0aGUgZ3JpZC5cclxuICpcclxuICogQHBhcmFtIHtudW1iZXJ9IHNpemUgVGhlIGdyaWQgc2l6ZS5cclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuc2V0R3JpZFNpemUgPSBmdW5jdGlvbihzaXplKSB7XHJcbiAgdGhpcy5ncmlkU2l6ZV8gPSBzaXplO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBSZXR1cm5zIHRoZSBtaW4gY2x1c3RlciBzaXplLlxyXG4gKlxyXG4gKiBAcmV0dXJuIHtudW1iZXJ9IFRoZSBncmlkIHNpemUuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmdldE1pbkNsdXN0ZXJTaXplID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWluQ2x1c3RlclNpemVfO1xyXG59O1xyXG5cclxuLyoqXHJcbiAqIFNldHMgdGhlIG1pbiBjbHVzdGVyIHNpemUuXHJcbiAqXHJcbiAqIEBwYXJhbSB7bnVtYmVyfSBzaXplIFRoZSBncmlkIHNpemUuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldE1pbkNsdXN0ZXJTaXplID0gZnVuY3Rpb24oc2l6ZSkge1xyXG4gIHRoaXMubWluQ2x1c3RlclNpemVfID0gc2l6ZTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogRXh0ZW5kcyBhIGJvdW5kcyBvYmplY3QgYnkgdGhlIGdyaWQgc2l6ZS5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5MYXRMbmdCb3VuZHN9IGJvdW5kcyBUaGUgYm91bmRzIHRvIGV4dGVuZC5cclxuICogQHJldHVybiB7Z29vZ2xlLm1hcHMuTGF0TG5nQm91bmRzfSBUaGUgZXh0ZW5kZWQgYm91bmRzLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRFeHRlbmRlZEJvdW5kcyA9IGZ1bmN0aW9uKGJvdW5kcykge1xyXG4gIHZhciBwcm9qZWN0aW9uID0gdGhpcy5nZXRQcm9qZWN0aW9uKCk7XHJcblxyXG4gIC8vIFR1cm4gdGhlIGJvdW5kcyBpbnRvIGxhdGxuZy5cclxuICB2YXIgdHIgPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nKGJvdW5kcy5nZXROb3J0aEVhc3QoKS5sYXQoKSxcclxuICAgICAgYm91bmRzLmdldE5vcnRoRWFzdCgpLmxuZygpKTtcclxuICB2YXIgYmwgPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nKGJvdW5kcy5nZXRTb3V0aFdlc3QoKS5sYXQoKSxcclxuICAgICAgYm91bmRzLmdldFNvdXRoV2VzdCgpLmxuZygpKTtcclxuXHJcbiAgLy8gQ29udmVydCB0aGUgcG9pbnRzIHRvIHBpeGVscyBhbmQgdGhlIGV4dGVuZCBvdXQgYnkgdGhlIGdyaWQgc2l6ZS5cclxuICB2YXIgdHJQaXggPSBwcm9qZWN0aW9uLmZyb21MYXRMbmdUb0RpdlBpeGVsKHRyKTtcclxuICB0clBpeC54ICs9IHRoaXMuZ3JpZFNpemVfO1xyXG4gIHRyUGl4LnkgLT0gdGhpcy5ncmlkU2l6ZV87XHJcblxyXG4gIHZhciBibFBpeCA9IHByb2plY3Rpb24uZnJvbUxhdExuZ1RvRGl2UGl4ZWwoYmwpO1xyXG4gIGJsUGl4LnggLT0gdGhpcy5ncmlkU2l6ZV87XHJcbiAgYmxQaXgueSArPSB0aGlzLmdyaWRTaXplXztcclxuXHJcbiAgLy8gQ29udmVydCB0aGUgcGl4ZWwgcG9pbnRzIGJhY2sgdG8gTGF0TG5nXHJcbiAgdmFyIG5lID0gcHJvamVjdGlvbi5mcm9tRGl2UGl4ZWxUb0xhdExuZyh0clBpeCk7XHJcbiAgdmFyIHN3ID0gcHJvamVjdGlvbi5mcm9tRGl2UGl4ZWxUb0xhdExuZyhibFBpeCk7XHJcblxyXG4gIC8vIEV4dGVuZCB0aGUgYm91bmRzIHRvIGNvbnRhaW4gdGhlIG5ldyBib3VuZHMuXHJcbiAgYm91bmRzLmV4dGVuZChuZSk7XHJcbiAgYm91bmRzLmV4dGVuZChzdyk7XHJcblxyXG4gIHJldHVybiBib3VuZHM7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIERldGVybWlucyBpZiBhIG1hcmtlciBpcyBjb250YWluZWQgaW4gYSBib3VuZHMuXHJcbiAqXHJcbiAqIEBwYXJhbSB7Z29vZ2xlLm1hcHMuTWFya2VyfSBtYXJrZXIgVGhlIG1hcmtlciB0byBjaGVjay5cclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5MYXRMbmdCb3VuZHN9IGJvdW5kcyBUaGUgYm91bmRzIHRvIGNoZWNrIGFnYWluc3QuXHJcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFRydWUgaWYgdGhlIG1hcmtlciBpcyBpbiB0aGUgYm91bmRzLlxyXG4gKiBAcHJpdmF0ZVxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5pc01hcmtlckluQm91bmRzXyA9IGZ1bmN0aW9uKG1hcmtlciwgYm91bmRzKSB7XHJcbiAgcmV0dXJuIGJvdW5kcy5jb250YWlucyhtYXJrZXIuZ2V0UG9zaXRpb24oKSk7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIENsZWFycyBhbGwgY2x1c3RlcnMgYW5kIG1hcmtlcnMgZnJvbSB0aGUgY2x1c3RlcmVyLlxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5jbGVhck1hcmtlcnMgPSBmdW5jdGlvbigpIHtcclxuICB0aGlzLnJlc2V0Vmlld3BvcnQodHJ1ZSk7XHJcblxyXG4gIC8vIFNldCB0aGUgbWFya2VycyBhIGVtcHR5IGFycmF5LlxyXG4gIHRoaXMubWFya2Vyc18gPSBbXTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogQ2xlYXJzIGFsbCBleGlzdGluZyBjbHVzdGVycyBhbmQgcmVjcmVhdGVzIHRoZW0uXHJcbiAqIEBwYXJhbSB7Ym9vbGVhbn0gb3B0X2hpZGUgVG8gYWxzbyBoaWRlIHRoZSBtYXJrZXIuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlc2V0Vmlld3BvcnQgPSBmdW5jdGlvbihvcHRfaGlkZSkge1xyXG4gIC8vIFJlbW92ZSBhbGwgdGhlIGNsdXN0ZXJzXHJcbiAgZm9yICh2YXIgaSA9IDAsIGNsdXN0ZXI7IGNsdXN0ZXIgPSB0aGlzLmNsdXN0ZXJzX1tpXTsgaSsrKSB7XHJcbiAgICBjbHVzdGVyLnJlbW92ZSgpO1xyXG4gIH1cclxuXHJcbiAgLy8gUmVzZXQgdGhlIG1hcmtlcnMgdG8gbm90IGJlIGFkZGVkIGFuZCB0byBiZSBpbnZpc2libGUuXHJcbiAgZm9yICh2YXIgaSA9IDAsIG1hcmtlcjsgbWFya2VyID0gdGhpcy5tYXJrZXJzX1tpXTsgaSsrKSB7XHJcbiAgICBtYXJrZXIuaXNBZGRlZCA9IGZhbHNlO1xyXG4gICAgaWYgKG9wdF9oaWRlKSB7XHJcbiAgICAgIG1hcmtlci5zZXRNYXAobnVsbCk7XHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICB0aGlzLmNsdXN0ZXJzXyA9IFtdO1xyXG59O1xyXG5cclxuLyoqXHJcbiAqXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlcGFpbnQgPSBmdW5jdGlvbigpIHtcclxuICB2YXIgb2xkQ2x1c3RlcnMgPSB0aGlzLmNsdXN0ZXJzXy5zbGljZSgpO1xyXG4gIHRoaXMuY2x1c3RlcnNfLmxlbmd0aCA9IDA7XHJcbiAgdGhpcy5yZXNldFZpZXdwb3J0KCk7XHJcbiAgdGhpcy5yZWRyYXcoKTtcclxuXHJcbiAgLy8gUmVtb3ZlIHRoZSBvbGQgY2x1c3RlcnMuXHJcbiAgLy8gRG8gaXQgaW4gYSB0aW1lb3V0IHNvIHRoZSBvdGhlciBjbHVzdGVycyBoYXZlIGJlZW4gZHJhd24gZmlyc3QuXHJcbiAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICBmb3IgKHZhciBpID0gMCwgY2x1c3RlcjsgY2x1c3RlciA9IG9sZENsdXN0ZXJzW2ldOyBpKyspIHtcclxuICAgICAgY2x1c3Rlci5yZW1vdmUoKTtcclxuICAgIH1cclxuICB9LCAwKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmVkcmF3cyB0aGUgY2x1c3RlcnMuXHJcbiAqL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlZHJhdyA9IGZ1bmN0aW9uKCkge1xyXG4gIHRoaXMuY3JlYXRlQ2x1c3RlcnNfKCk7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIENhbGN1bGF0ZXMgdGhlIGRpc3RhbmNlIGJldHdlZW4gdHdvIGxhdGxuZyBsb2NhdGlvbnMgaW4ga20uXHJcbiAqIEBzZWUgaHR0cDovL3d3dy5tb3ZhYmxlLXR5cGUuY28udWsvc2NyaXB0cy9sYXRsb25nLmh0bWxcclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5MYXRMbmd9IHAxIFRoZSBmaXJzdCBsYXQgbG5nIHBvaW50LlxyXG4gKiBAcGFyYW0ge2dvb2dsZS5tYXBzLkxhdExuZ30gcDIgVGhlIHNlY29uZCBsYXQgbG5nIHBvaW50LlxyXG4gKiBAcmV0dXJuIHtudW1iZXJ9IFRoZSBkaXN0YW5jZSBiZXR3ZWVuIHRoZSB0d28gcG9pbnRzIGluIGttLlxyXG4gKiBAcHJpdmF0ZVxyXG4qL1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmRpc3RhbmNlQmV0d2VlblBvaW50c18gPSBmdW5jdGlvbihwMSwgcDIpIHtcclxuICBpZiAoIXAxIHx8ICFwMikge1xyXG4gICAgcmV0dXJuIDA7XHJcbiAgfVxyXG5cclxuICB2YXIgUiA9IDYzNzE7IC8vIFJhZGl1cyBvZiB0aGUgRWFydGggaW4ga21cclxuICB2YXIgZExhdCA9IChwMi5sYXQoKSAtIHAxLmxhdCgpKSAqIE1hdGguUEkgLyAxODA7XHJcbiAgdmFyIGRMb24gPSAocDIubG5nKCkgLSBwMS5sbmcoKSkgKiBNYXRoLlBJIC8gMTgwO1xyXG4gIHZhciBhID0gTWF0aC5zaW4oZExhdCAvIDIpICogTWF0aC5zaW4oZExhdCAvIDIpICtcclxuICAgIE1hdGguY29zKHAxLmxhdCgpICogTWF0aC5QSSAvIDE4MCkgKiBNYXRoLmNvcyhwMi5sYXQoKSAqIE1hdGguUEkgLyAxODApICpcclxuICAgIE1hdGguc2luKGRMb24gLyAyKSAqIE1hdGguc2luKGRMb24gLyAyKTtcclxuICB2YXIgYyA9IDIgKiBNYXRoLmF0YW4yKE1hdGguc3FydChhKSwgTWF0aC5zcXJ0KDEgLSBhKSk7XHJcbiAgdmFyIGQgPSBSICogYztcclxuICByZXR1cm4gZDtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogQWRkIGEgbWFya2VyIHRvIGEgY2x1c3Rlciwgb3IgY3JlYXRlcyBhIG5ldyBjbHVzdGVyLlxyXG4gKlxyXG4gKiBAcGFyYW0ge2dvb2dsZS5tYXBzLk1hcmtlcn0gbWFya2VyIFRoZSBtYXJrZXIgdG8gYWRkLlxyXG4gKiBAcHJpdmF0ZVxyXG4gKi9cclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5hZGRUb0Nsb3Nlc3RDbHVzdGVyXyA9IGZ1bmN0aW9uKG1hcmtlcikge1xyXG4gIHZhciBkaXN0YW5jZSA9IDQwMDAwOyAvLyBTb21lIGxhcmdlIG51bWJlclxyXG4gIHZhciBjbHVzdGVyVG9BZGRUbyA9IG51bGw7XHJcbiAgdmFyIHBvcyA9IG1hcmtlci5nZXRQb3NpdGlvbigpO1xyXG4gIGZvciAodmFyIGkgPSAwLCBjbHVzdGVyOyBjbHVzdGVyID0gdGhpcy5jbHVzdGVyc19baV07IGkrKykge1xyXG4gICAgdmFyIGNlbnRlciA9IGNsdXN0ZXIuZ2V0Q2VudGVyKCk7XHJcbiAgICBpZiAoY2VudGVyKSB7XHJcbiAgICAgIHZhciBkID0gdGhpcy5kaXN0YW5jZUJldHdlZW5Qb2ludHNfKGNlbnRlciwgbWFya2VyLmdldFBvc2l0aW9uKCkpO1xyXG4gICAgICBpZiAoZCA8IGRpc3RhbmNlKSB7XHJcbiAgICAgICAgZGlzdGFuY2UgPSBkO1xyXG4gICAgICAgIGNsdXN0ZXJUb0FkZFRvID0gY2x1c3RlcjtcclxuICAgICAgfVxyXG4gICAgfVxyXG4gIH1cclxuXHJcbiAgaWYgKGNsdXN0ZXJUb0FkZFRvICYmIGNsdXN0ZXJUb0FkZFRvLmlzTWFya2VySW5DbHVzdGVyQm91bmRzKG1hcmtlcikpIHtcclxuICAgIGNsdXN0ZXJUb0FkZFRvLmFkZE1hcmtlcihtYXJrZXIpO1xyXG4gIH0gZWxzZSB7XHJcbiAgICB2YXIgY2x1c3RlciA9IG5ldyBDbHVzdGVyKHRoaXMpO1xyXG4gICAgY2x1c3Rlci5hZGRNYXJrZXIobWFya2VyKTtcclxuICAgIHRoaXMuY2x1c3RlcnNfLnB1c2goY2x1c3Rlcik7XHJcbiAgfVxyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBDcmVhdGVzIHRoZSBjbHVzdGVycy5cclxuICpcclxuICogQHByaXZhdGVcclxuICovXHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuY3JlYXRlQ2x1c3RlcnNfID0gZnVuY3Rpb24oKSB7XHJcbiAgaWYgKCF0aGlzLnJlYWR5Xykge1xyXG4gICAgcmV0dXJuO1xyXG4gIH1cclxuXHJcbiAgLy8gR2V0IG91ciBjdXJyZW50IG1hcCB2aWV3IGJvdW5kcy5cclxuICAvLyBDcmVhdGUgYSBuZXcgYm91bmRzIG9iamVjdCBzbyB3ZSBkb24ndCBhZmZlY3QgdGhlIG1hcC5cclxuICB2YXIgbWFwQm91bmRzID0gbmV3IGdvb2dsZS5tYXBzLkxhdExuZ0JvdW5kcyh0aGlzLm1hcF8uZ2V0Qm91bmRzKCkuZ2V0U291dGhXZXN0KCksXHJcbiAgICAgIHRoaXMubWFwXy5nZXRCb3VuZHMoKS5nZXROb3J0aEVhc3QoKSk7XHJcbiAgdmFyIGJvdW5kcyA9IHRoaXMuZ2V0RXh0ZW5kZWRCb3VuZHMobWFwQm91bmRzKTtcclxuXHJcbiAgZm9yICh2YXIgaSA9IDAsIG1hcmtlcjsgbWFya2VyID0gdGhpcy5tYXJrZXJzX1tpXTsgaSsrKSB7XHJcbiAgICBpZiAoIW1hcmtlci5pc0FkZGVkICYmIHRoaXMuaXNNYXJrZXJJbkJvdW5kc18obWFya2VyLCBib3VuZHMpKSB7XHJcbiAgICAgIHRoaXMuYWRkVG9DbG9zZXN0Q2x1c3Rlcl8obWFya2VyKTtcclxuICAgIH1cclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIEEgY2x1c3RlciB0aGF0IGNvbnRhaW5zIG1hcmtlcnMuXHJcbiAqXHJcbiAqIEBwYXJhbSB7TWFya2VyQ2x1c3RlcmVyfSBtYXJrZXJDbHVzdGVyZXIgVGhlIG1hcmtlcmNsdXN0ZXJlciB0aGF0IHRoaXNcclxuICogICAgIGNsdXN0ZXIgaXMgYXNzb2NpYXRlZCB3aXRoLlxyXG4gKiBAY29uc3RydWN0b3JcclxuICogQGlnbm9yZVxyXG4gKi9cclxuZnVuY3Rpb24gQ2x1c3RlcihtYXJrZXJDbHVzdGVyZXIpIHtcclxuICB0aGlzLm1hcmtlckNsdXN0ZXJlcl8gPSBtYXJrZXJDbHVzdGVyZXI7XHJcbiAgdGhpcy5tYXBfID0gbWFya2VyQ2x1c3RlcmVyLmdldE1hcCgpO1xyXG4gIHRoaXMuZ3JpZFNpemVfID0gbWFya2VyQ2x1c3RlcmVyLmdldEdyaWRTaXplKCk7XHJcbiAgdGhpcy5taW5DbHVzdGVyU2l6ZV8gPSBtYXJrZXJDbHVzdGVyZXIuZ2V0TWluQ2x1c3RlclNpemUoKTtcclxuICB0aGlzLmF2ZXJhZ2VDZW50ZXJfID0gbWFya2VyQ2x1c3RlcmVyLmlzQXZlcmFnZUNlbnRlcigpO1xyXG4gIHRoaXMuY2VudGVyXyA9IG51bGw7XHJcbiAgdGhpcy5tYXJrZXJzXyA9IFtdO1xyXG4gIHRoaXMuYm91bmRzXyA9IG51bGw7XHJcbiAgdGhpcy5jbHVzdGVySWNvbl8gPSBuZXcgQ2x1c3Rlckljb24odGhpcywgbWFya2VyQ2x1c3RlcmVyLmdldFN0eWxlcygpLFxyXG4gICAgICBtYXJrZXJDbHVzdGVyZXIuZ2V0R3JpZFNpemUoKSk7XHJcbn1cclxuXHJcbi8qKlxyXG4gKiBEZXRlcm1pbnMgaWYgYSBtYXJrZXIgaXMgYWxyZWFkeSBhZGRlZCB0byB0aGUgY2x1c3Rlci5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5NYXJrZXJ9IG1hcmtlciBUaGUgbWFya2VyIHRvIGNoZWNrLlxyXG4gKiBAcmV0dXJuIHtib29sZWFufSBUcnVlIGlmIHRoZSBtYXJrZXIgaXMgYWxyZWFkeSBhZGRlZC5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmlzTWFya2VyQWxyZWFkeUFkZGVkID0gZnVuY3Rpb24obWFya2VyKSB7XHJcbiAgaWYgKHRoaXMubWFya2Vyc18uaW5kZXhPZikge1xyXG4gICAgcmV0dXJuIHRoaXMubWFya2Vyc18uaW5kZXhPZihtYXJrZXIpICE9IC0xO1xyXG4gIH0gZWxzZSB7XHJcbiAgICBmb3IgKHZhciBpID0gMCwgbTsgbSA9IHRoaXMubWFya2Vyc19baV07IGkrKykge1xyXG4gICAgICBpZiAobSA9PSBtYXJrZXIpIHtcclxuICAgICAgICByZXR1cm4gdHJ1ZTtcclxuICAgICAgfVxyXG4gICAgfVxyXG4gIH1cclxuICByZXR1cm4gZmFsc2U7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIEFkZCBhIG1hcmtlciB0aGUgY2x1c3Rlci5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5NYXJrZXJ9IG1hcmtlciBUaGUgbWFya2VyIHRvIGFkZC5cclxuICogQHJldHVybiB7Ym9vbGVhbn0gVHJ1ZSBpZiB0aGUgbWFya2VyIHdhcyBhZGRlZC5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmFkZE1hcmtlciA9IGZ1bmN0aW9uKG1hcmtlcikge1xyXG4gIGlmICh0aGlzLmlzTWFya2VyQWxyZWFkeUFkZGVkKG1hcmtlcikpIHtcclxuICAgIHJldHVybiBmYWxzZTtcclxuICB9XHJcblxyXG4gIGlmICghdGhpcy5jZW50ZXJfKSB7XHJcbiAgICB0aGlzLmNlbnRlcl8gPSBtYXJrZXIuZ2V0UG9zaXRpb24oKTtcclxuICAgIHRoaXMuY2FsY3VsYXRlQm91bmRzXygpO1xyXG4gIH0gZWxzZSB7XHJcbiAgICBpZiAodGhpcy5hdmVyYWdlQ2VudGVyXykge1xyXG4gICAgICB2YXIgbCA9IHRoaXMubWFya2Vyc18ubGVuZ3RoICsgMTtcclxuICAgICAgdmFyIGxhdCA9ICh0aGlzLmNlbnRlcl8ubGF0KCkgKiAobC0xKSArIG1hcmtlci5nZXRQb3NpdGlvbigpLmxhdCgpKSAvIGw7XHJcbiAgICAgIHZhciBsbmcgPSAodGhpcy5jZW50ZXJfLmxuZygpICogKGwtMSkgKyBtYXJrZXIuZ2V0UG9zaXRpb24oKS5sbmcoKSkgLyBsO1xyXG4gICAgICB0aGlzLmNlbnRlcl8gPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nKGxhdCwgbG5nKTtcclxuICAgICAgdGhpcy5jYWxjdWxhdGVCb3VuZHNfKCk7XHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBtYXJrZXIuaXNBZGRlZCA9IHRydWU7XHJcbiAgdGhpcy5tYXJrZXJzXy5wdXNoKG1hcmtlcik7XHJcblxyXG4gIHZhciBsZW4gPSB0aGlzLm1hcmtlcnNfLmxlbmd0aDtcclxuICBpZiAobGVuIDwgdGhpcy5taW5DbHVzdGVyU2l6ZV8gJiYgbWFya2VyLmdldE1hcCgpICE9IHRoaXMubWFwXykge1xyXG4gICAgLy8gTWluIGNsdXN0ZXIgc2l6ZSBub3QgcmVhY2hlZCBzbyBzaG93IHRoZSBtYXJrZXIuXHJcbiAgICBtYXJrZXIuc2V0TWFwKHRoaXMubWFwXyk7XHJcbiAgfVxyXG5cclxuICBpZiAobGVuID09IHRoaXMubWluQ2x1c3RlclNpemVfKSB7XHJcbiAgICAvLyBIaWRlIHRoZSBtYXJrZXJzIHRoYXQgd2VyZSBzaG93aW5nLlxyXG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBsZW47IGkrKykge1xyXG4gICAgICB0aGlzLm1hcmtlcnNfW2ldLnNldE1hcChudWxsKTtcclxuICAgIH1cclxuICB9XHJcblxyXG4gIGlmIChsZW4gPj0gdGhpcy5taW5DbHVzdGVyU2l6ZV8pIHtcclxuICAgIG1hcmtlci5zZXRNYXAobnVsbCk7XHJcbiAgfVxyXG5cclxuICB0aGlzLnVwZGF0ZUljb24oKTtcclxuICByZXR1cm4gdHJ1ZTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyB0aGUgbWFya2VyIGNsdXN0ZXJlciB0aGF0IHRoZSBjbHVzdGVyIGlzIGFzc29jaWF0ZWQgd2l0aC5cclxuICpcclxuICogQHJldHVybiB7TWFya2VyQ2x1c3RlcmVyfSBUaGUgYXNzb2NpYXRlZCBtYXJrZXIgY2x1c3RlcmVyLlxyXG4gKi9cclxuQ2x1c3Rlci5wcm90b3R5cGUuZ2V0TWFya2VyQ2x1c3RlcmVyID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWFya2VyQ2x1c3RlcmVyXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyB0aGUgYm91bmRzIG9mIHRoZSBjbHVzdGVyLlxyXG4gKlxyXG4gKiBAcmV0dXJuIHtnb29nbGUubWFwcy5MYXRMbmdCb3VuZHN9IHRoZSBjbHVzdGVyIGJvdW5kcy5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmdldEJvdW5kcyA9IGZ1bmN0aW9uKCkge1xyXG4gIHZhciBib3VuZHMgPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nQm91bmRzKHRoaXMuY2VudGVyXywgdGhpcy5jZW50ZXJfKTtcclxuICB2YXIgbWFya2VycyA9IHRoaXMuZ2V0TWFya2VycygpO1xyXG4gIGZvciAodmFyIGkgPSAwLCBtYXJrZXI7IG1hcmtlciA9IG1hcmtlcnNbaV07IGkrKykge1xyXG4gICAgYm91bmRzLmV4dGVuZChtYXJrZXIuZ2V0UG9zaXRpb24oKSk7XHJcbiAgfVxyXG4gIHJldHVybiBib3VuZHM7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJlbW92ZXMgdGhlIGNsdXN0ZXJcclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLnJlbW92ZSA9IGZ1bmN0aW9uKCkge1xyXG4gIHRoaXMuY2x1c3Rlckljb25fLnJlbW92ZSgpO1xyXG4gIHRoaXMubWFya2Vyc18ubGVuZ3RoID0gMDtcclxuICBkZWxldGUgdGhpcy5tYXJrZXJzXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyB0aGUgbnVtYmVyIG9mIG1hcmtlcnMgaW4gdGhlIGNsdXN0ZXIuXHJcbiAqXHJcbiAqIEByZXR1cm4ge251bWJlcn0gVGhlIG51bWJlciBvZiBtYXJrZXJzIGluIHRoZSBjbHVzdGVyLlxyXG4gKi9cclxuQ2x1c3Rlci5wcm90b3R5cGUuZ2V0U2l6ZSA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLm1hcmtlcnNfLmxlbmd0aDtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyBhIGxpc3Qgb2YgdGhlIG1hcmtlcnMgaW4gdGhlIGNsdXN0ZXIuXHJcbiAqXHJcbiAqIEByZXR1cm4ge0FycmF5Ljxnb29nbGUubWFwcy5NYXJrZXI+fSBUaGUgbWFya2VycyBpbiB0aGUgY2x1c3Rlci5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmdldE1hcmtlcnMgPSBmdW5jdGlvbigpIHtcclxuICByZXR1cm4gdGhpcy5tYXJrZXJzXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogUmV0dXJucyB0aGUgY2VudGVyIG9mIHRoZSBjbHVzdGVyLlxyXG4gKlxyXG4gKiBAcmV0dXJuIHtnb29nbGUubWFwcy5MYXRMbmd9IFRoZSBjbHVzdGVyIGNlbnRlci5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmdldENlbnRlciA9IGZ1bmN0aW9uKCkge1xyXG4gIHJldHVybiB0aGlzLmNlbnRlcl87XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIENhbGN1bGF0ZWQgdGhlIGV4dGVuZGVkIGJvdW5kcyBvZiB0aGUgY2x1c3RlciB3aXRoIHRoZSBncmlkLlxyXG4gKlxyXG4gKiBAcHJpdmF0ZVxyXG4gKi9cclxuQ2x1c3Rlci5wcm90b3R5cGUuY2FsY3VsYXRlQm91bmRzXyA9IGZ1bmN0aW9uKCkge1xyXG4gIHZhciBib3VuZHMgPSBuZXcgZ29vZ2xlLm1hcHMuTGF0TG5nQm91bmRzKHRoaXMuY2VudGVyXywgdGhpcy5jZW50ZXJfKTtcclxuICB0aGlzLmJvdW5kc18gPSB0aGlzLm1hcmtlckNsdXN0ZXJlcl8uZ2V0RXh0ZW5kZWRCb3VuZHMoYm91bmRzKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogRGV0ZXJtaW5lcyBpZiBhIG1hcmtlciBsaWVzIGluIHRoZSBjbHVzdGVycyBib3VuZHMuXHJcbiAqXHJcbiAqIEBwYXJhbSB7Z29vZ2xlLm1hcHMuTWFya2VyfSBtYXJrZXIgVGhlIG1hcmtlciB0byBjaGVjay5cclxuICogQHJldHVybiB7Ym9vbGVhbn0gVHJ1ZSBpZiB0aGUgbWFya2VyIGxpZXMgaW4gdGhlIGJvdW5kcy5cclxuICovXHJcbkNsdXN0ZXIucHJvdG90eXBlLmlzTWFya2VySW5DbHVzdGVyQm91bmRzID0gZnVuY3Rpb24obWFya2VyKSB7XHJcbiAgcmV0dXJuIHRoaXMuYm91bmRzXy5jb250YWlucyhtYXJrZXIuZ2V0UG9zaXRpb24oKSk7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJldHVybnMgdGhlIG1hcCB0aGF0IHRoZSBjbHVzdGVyIGlzIGFzc29jaWF0ZWQgd2l0aC5cclxuICpcclxuICogQHJldHVybiB7Z29vZ2xlLm1hcHMuTWFwfSBUaGUgbWFwLlxyXG4gKi9cclxuQ2x1c3Rlci5wcm90b3R5cGUuZ2V0TWFwID0gZnVuY3Rpb24oKSB7XHJcbiAgcmV0dXJuIHRoaXMubWFwXztcclxufTtcclxuXHJcblxyXG4vKipcclxuICogVXBkYXRlcyB0aGUgY2x1c3RlciBpY29uXHJcbiAqL1xyXG5DbHVzdGVyLnByb3RvdHlwZS51cGRhdGVJY29uID0gZnVuY3Rpb24oKSB7XHJcbiAgdmFyIHpvb20gPSB0aGlzLm1hcF8uZ2V0Wm9vbSgpO1xyXG4gIHZhciBteiA9IHRoaXMubWFya2VyQ2x1c3RlcmVyXy5nZXRNYXhab29tKCk7XHJcblxyXG4gIGlmIChteiAmJiB6b29tID4gbXopIHtcclxuICAgIC8vIFRoZSB6b29tIGlzIGdyZWF0ZXIgdGhhbiBvdXIgbWF4IHpvb20gc28gc2hvdyBhbGwgdGhlIG1hcmtlcnMgaW4gY2x1c3Rlci5cclxuICAgIGZvciAodmFyIGkgPSAwLCBtYXJrZXI7IG1hcmtlciA9IHRoaXMubWFya2Vyc19baV07IGkrKykge1xyXG4gICAgICBtYXJrZXIuc2V0TWFwKHRoaXMubWFwXyk7XHJcbiAgICB9XHJcbiAgICByZXR1cm47XHJcbiAgfVxyXG5cclxuICBpZiAodGhpcy5tYXJrZXJzXy5sZW5ndGggPCB0aGlzLm1pbkNsdXN0ZXJTaXplXykge1xyXG4gICAgLy8gTWluIGNsdXN0ZXIgc2l6ZSBub3QgeWV0IHJlYWNoZWQuXHJcbiAgICB0aGlzLmNsdXN0ZXJJY29uXy5oaWRlKCk7XHJcbiAgICByZXR1cm47XHJcbiAgfVxyXG5cclxuICB2YXIgbnVtU3R5bGVzID0gdGhpcy5tYXJrZXJDbHVzdGVyZXJfLmdldFN0eWxlcygpLmxlbmd0aDtcclxuICB2YXIgc3VtcyA9IHRoaXMubWFya2VyQ2x1c3RlcmVyXy5nZXRDYWxjdWxhdG9yKCkodGhpcy5tYXJrZXJzXywgbnVtU3R5bGVzKTtcclxuICB0aGlzLmNsdXN0ZXJJY29uXy5zZXRDZW50ZXIodGhpcy5jZW50ZXJfKTtcclxuICB0aGlzLmNsdXN0ZXJJY29uXy5zZXRTdW1zKHN1bXMpO1xyXG4gIHRoaXMuY2x1c3Rlckljb25fLnNob3coKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogQSBjbHVzdGVyIGljb25cclxuICpcclxuICogQHBhcmFtIHtDbHVzdGVyfSBjbHVzdGVyIFRoZSBjbHVzdGVyIHRvIGJlIGFzc29jaWF0ZWQgd2l0aC5cclxuICogQHBhcmFtIHtPYmplY3R9IHN0eWxlcyBBbiBvYmplY3QgdGhhdCBoYXMgc3R5bGUgcHJvcGVydGllczpcclxuICogICAgICd1cmwnOiAoc3RyaW5nKSBUaGUgaW1hZ2UgdXJsLlxyXG4gKiAgICAgJ2hlaWdodCc6IChudW1iZXIpIFRoZSBpbWFnZSBoZWlnaHQuXHJcbiAqICAgICAnd2lkdGgnOiAobnVtYmVyKSBUaGUgaW1hZ2Ugd2lkdGguXHJcbiAqICAgICAnYW5jaG9yJzogKEFycmF5KSBUaGUgYW5jaG9yIHBvc2l0aW9uIG9mIHRoZSBsYWJlbCB0ZXh0LlxyXG4gKiAgICAgJ3RleHRDb2xvcic6IChzdHJpbmcpIFRoZSB0ZXh0IGNvbG9yLlxyXG4gKiAgICAgJ3RleHRTaXplJzogKG51bWJlcikgVGhlIHRleHQgc2l6ZS5cclxuICogICAgICdiYWNrZ3JvdW5kUG9zaXRpb246IChzdHJpbmcpIFRoZSBiYWNrZ3JvdW5kIHBvc3RpdGlvbiB4LCB5LlxyXG4gKiBAcGFyYW0ge251bWJlcj19IG9wdF9wYWRkaW5nIE9wdGlvbmFsIHBhZGRpbmcgdG8gYXBwbHkgdG8gdGhlIGNsdXN0ZXIgaWNvbi5cclxuICogQGNvbnN0cnVjdG9yXHJcbiAqIEBleHRlbmRzIGdvb2dsZS5tYXBzLk92ZXJsYXlWaWV3XHJcbiAqIEBpZ25vcmVcclxuICovXHJcbmZ1bmN0aW9uIENsdXN0ZXJJY29uKGNsdXN0ZXIsIHN0eWxlcywgb3B0X3BhZGRpbmcpIHtcclxuICBjbHVzdGVyLmdldE1hcmtlckNsdXN0ZXJlcigpLmV4dGVuZChDbHVzdGVySWNvbiwgZ29vZ2xlLm1hcHMuT3ZlcmxheVZpZXcpO1xyXG5cclxuICB0aGlzLnN0eWxlc18gPSBzdHlsZXM7XHJcbiAgdGhpcy5wYWRkaW5nXyA9IG9wdF9wYWRkaW5nIHx8IDA7XHJcbiAgdGhpcy5jbHVzdGVyXyA9IGNsdXN0ZXI7XHJcbiAgdGhpcy5jZW50ZXJfID0gbnVsbDtcclxuICB0aGlzLm1hcF8gPSBjbHVzdGVyLmdldE1hcCgpO1xyXG4gIHRoaXMuZGl2XyA9IG51bGw7XHJcbiAgdGhpcy5zdW1zXyA9IG51bGw7XHJcbiAgdGhpcy52aXNpYmxlXyA9IGZhbHNlO1xyXG5cclxuICB0aGlzLnNldE1hcCh0aGlzLm1hcF8pO1xyXG59XHJcblxyXG5cclxuLyoqXHJcbiAqIFRyaWdnZXJzIHRoZSBjbHVzdGVyY2xpY2sgZXZlbnQgYW5kIHpvb20ncyBpZiB0aGUgb3B0aW9uIGlzIHNldC5cclxuICovXHJcbkNsdXN0ZXJJY29uLnByb3RvdHlwZS50cmlnZ2VyQ2x1c3RlckNsaWNrID0gZnVuY3Rpb24oKSB7XHJcbiAgdmFyIG1hcmtlckNsdXN0ZXJlciA9IHRoaXMuY2x1c3Rlcl8uZ2V0TWFya2VyQ2x1c3RlcmVyKCk7XHJcblxyXG4gIC8vIFRyaWdnZXIgdGhlIGNsdXN0ZXJjbGljayBldmVudC5cclxuICBnb29nbGUubWFwcy5ldmVudC50cmlnZ2VyKG1hcmtlckNsdXN0ZXJlci5tYXBfLCAnY2x1c3RlcmNsaWNrJywgdGhpcy5jbHVzdGVyXyk7XHJcblxyXG4gIGlmIChtYXJrZXJDbHVzdGVyZXIuaXNab29tT25DbGljaygpKSB7XHJcbiAgICAvLyBab29tIGludG8gdGhlIGNsdXN0ZXIuXHJcbiAgICB0aGlzLm1hcF8uZml0Qm91bmRzKHRoaXMuY2x1c3Rlcl8uZ2V0Qm91bmRzKCkpO1xyXG4gIH1cclxufTtcclxuXHJcblxyXG4vKipcclxuICogQWRkaW5nIHRoZSBjbHVzdGVyIGljb24gdG8gdGhlIGRvbS5cclxuICogQGlnbm9yZVxyXG4gKi9cclxuQ2x1c3Rlckljb24ucHJvdG90eXBlLm9uQWRkID0gZnVuY3Rpb24oKSB7XHJcbiAgdGhpcy5kaXZfID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnRElWJyk7XHJcbiAgaWYgKHRoaXMudmlzaWJsZV8pIHtcclxuICAgIHZhciBwb3MgPSB0aGlzLmdldFBvc0Zyb21MYXRMbmdfKHRoaXMuY2VudGVyXyk7XHJcbiAgICB0aGlzLmRpdl8uc3R5bGUuY3NzVGV4dCA9IHRoaXMuY3JlYXRlQ3NzKHBvcyk7XHJcbiAgICB0aGlzLmRpdl8uaW5uZXJIVE1MID0gdGhpcy5zdW1zXy50ZXh0O1xyXG4gIH1cclxuXHJcbiAgdmFyIHBhbmVzID0gdGhpcy5nZXRQYW5lcygpO1xyXG4gIHBhbmVzLm92ZXJsYXlNb3VzZVRhcmdldC5hcHBlbmRDaGlsZCh0aGlzLmRpdl8pO1xyXG5cclxuICB2YXIgdGhhdCA9IHRoaXM7XHJcbiAgZ29vZ2xlLm1hcHMuZXZlbnQuYWRkRG9tTGlzdGVuZXIodGhpcy5kaXZfLCAnY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgIHRoYXQudHJpZ2dlckNsdXN0ZXJDbGljaygpO1xyXG4gIH0pO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBSZXR1cm5zIHRoZSBwb3NpdGlvbiB0byBwbGFjZSB0aGUgZGl2IGRlbmRpbmcgb24gdGhlIGxhdGxuZy5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5MYXRMbmd9IGxhdGxuZyBUaGUgcG9zaXRpb24gaW4gbGF0bG5nLlxyXG4gKiBAcmV0dXJuIHtnb29nbGUubWFwcy5Qb2ludH0gVGhlIHBvc2l0aW9uIGluIHBpeGVscy5cclxuICogQHByaXZhdGVcclxuICovXHJcbkNsdXN0ZXJJY29uLnByb3RvdHlwZS5nZXRQb3NGcm9tTGF0TG5nXyA9IGZ1bmN0aW9uKGxhdGxuZykge1xyXG4gIHZhciBwb3MgPSB0aGlzLmdldFByb2plY3Rpb24oKS5mcm9tTGF0TG5nVG9EaXZQaXhlbChsYXRsbmcpO1xyXG4gIHBvcy54IC09IHBhcnNlSW50KHRoaXMud2lkdGhfIC8gMiwgMTApO1xyXG4gIHBvcy55IC09IHBhcnNlSW50KHRoaXMuaGVpZ2h0XyAvIDIsIDEwKTtcclxuICByZXR1cm4gcG9zO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBEcmF3IHRoZSBpY29uLlxyXG4gKiBAaWdub3JlXHJcbiAqL1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGUuZHJhdyA9IGZ1bmN0aW9uKCkge1xyXG4gIGlmICh0aGlzLnZpc2libGVfKSB7XHJcbiAgICB2YXIgcG9zID0gdGhpcy5nZXRQb3NGcm9tTGF0TG5nXyh0aGlzLmNlbnRlcl8pO1xyXG4gICAgdGhpcy5kaXZfLnN0eWxlLnRvcCA9IHBvcy55ICsgJ3B4JztcclxuICAgIHRoaXMuZGl2Xy5zdHlsZS5sZWZ0ID0gcG9zLnggKyAncHgnO1xyXG4gICAgdGhpcy5kaXZfLnN0eWxlLnpJbmRleCA9IGdvb2dsZS5tYXBzLk1hcmtlci5NQVhfWklOREVYICsgMTtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIEhpZGUgdGhlIGljb24uXHJcbiAqL1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGUuaGlkZSA9IGZ1bmN0aW9uKCkge1xyXG4gIGlmICh0aGlzLmRpdl8pIHtcclxuICAgIHRoaXMuZGl2Xy5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xyXG4gIH1cclxuICB0aGlzLnZpc2libGVfID0gZmFsc2U7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFBvc2l0aW9uIGFuZCBzaG93IHRoZSBpY29uLlxyXG4gKi9cclxuQ2x1c3Rlckljb24ucHJvdG90eXBlLnNob3cgPSBmdW5jdGlvbigpIHtcclxuICBpZiAodGhpcy5kaXZfKSB7XHJcbiAgICB2YXIgcG9zID0gdGhpcy5nZXRQb3NGcm9tTGF0TG5nXyh0aGlzLmNlbnRlcl8pO1xyXG4gICAgdGhpcy5kaXZfLnN0eWxlLmNzc1RleHQgPSB0aGlzLmNyZWF0ZUNzcyhwb3MpO1xyXG4gICAgdGhpcy5kaXZfLnN0eWxlLmRpc3BsYXkgPSAnJztcclxuICB9XHJcbiAgdGhpcy52aXNpYmxlXyA9IHRydWU7XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFJlbW92ZSB0aGUgaWNvbiBmcm9tIHRoZSBtYXBcclxuICovXHJcbkNsdXN0ZXJJY29uLnByb3RvdHlwZS5yZW1vdmUgPSBmdW5jdGlvbigpIHtcclxuICB0aGlzLnNldE1hcChudWxsKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogSW1wbGVtZW50YXRpb24gb2YgdGhlIG9uUmVtb3ZlIGludGVyZmFjZS5cclxuICogQGlnbm9yZVxyXG4gKi9cclxuQ2x1c3Rlckljb24ucHJvdG90eXBlLm9uUmVtb3ZlID0gZnVuY3Rpb24oKSB7XHJcbiAgaWYgKHRoaXMuZGl2XyAmJiB0aGlzLmRpdl8ucGFyZW50Tm9kZSkge1xyXG4gICAgdGhpcy5oaWRlKCk7XHJcbiAgICB0aGlzLmRpdl8ucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh0aGlzLmRpdl8pO1xyXG4gICAgdGhpcy5kaXZfID0gbnVsbDtcclxuICB9XHJcbn07XHJcblxyXG5cclxuLyoqXHJcbiAqIFNldCB0aGUgc3VtcyBvZiB0aGUgaWNvbi5cclxuICpcclxuICogQHBhcmFtIHtPYmplY3R9IHN1bXMgVGhlIHN1bXMgY29udGFpbmluZzpcclxuICogICAndGV4dCc6IChzdHJpbmcpIFRoZSB0ZXh0IHRvIGRpc3BsYXkgaW4gdGhlIGljb24uXHJcbiAqICAgJ2luZGV4JzogKG51bWJlcikgVGhlIHN0eWxlIGluZGV4IG9mIHRoZSBpY29uLlxyXG4gKi9cclxuQ2x1c3Rlckljb24ucHJvdG90eXBlLnNldFN1bXMgPSBmdW5jdGlvbihzdW1zKSB7XHJcbiAgdGhpcy5zdW1zXyA9IHN1bXM7XHJcbiAgdGhpcy50ZXh0XyA9IHN1bXMudGV4dDtcclxuICB0aGlzLmluZGV4XyA9IHN1bXMuaW5kZXg7XHJcbiAgaWYgKHRoaXMuZGl2Xykge1xyXG4gICAgdGhpcy5kaXZfLmlubmVySFRNTCA9IHN1bXMudGV4dDtcclxuICB9XHJcblxyXG4gIHRoaXMudXNlU3R5bGUoKTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogU2V0cyB0aGUgaWNvbiB0byB0aGUgdGhlIHN0eWxlcy5cclxuICovXHJcbkNsdXN0ZXJJY29uLnByb3RvdHlwZS51c2VTdHlsZSA9IGZ1bmN0aW9uKCkge1xyXG4gIHZhciBpbmRleCA9IE1hdGgubWF4KDAsIHRoaXMuc3Vtc18uaW5kZXggLSAxKTtcclxuICBpbmRleCA9IE1hdGgubWluKHRoaXMuc3R5bGVzXy5sZW5ndGggLSAxLCBpbmRleCk7XHJcbiAgdmFyIHN0eWxlID0gdGhpcy5zdHlsZXNfW2luZGV4XTtcclxuICB0aGlzLnVybF8gPSBzdHlsZVsndXJsJ107XHJcbiAgdGhpcy5oZWlnaHRfID0gc3R5bGVbJ2hlaWdodCddO1xyXG4gIHRoaXMud2lkdGhfID0gc3R5bGVbJ3dpZHRoJ107XHJcbiAgdGhpcy50ZXh0Q29sb3JfID0gc3R5bGVbJ3RleHRDb2xvciddO1xyXG4gIHRoaXMuYW5jaG9yXyA9IHN0eWxlWydhbmNob3InXTtcclxuICB0aGlzLnRleHRTaXplXyA9IHN0eWxlWyd0ZXh0U2l6ZSddO1xyXG4gIHRoaXMuYmFja2dyb3VuZFBvc2l0aW9uXyA9IHN0eWxlWydiYWNrZ3JvdW5kUG9zaXRpb24nXTtcclxufTtcclxuXHJcblxyXG4vKipcclxuICogU2V0cyB0aGUgY2VudGVyIG9mIHRoZSBpY29uLlxyXG4gKlxyXG4gKiBAcGFyYW0ge2dvb2dsZS5tYXBzLkxhdExuZ30gY2VudGVyIFRoZSBsYXRsbmcgdG8gc2V0IGFzIHRoZSBjZW50ZXIuXHJcbiAqL1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGUuc2V0Q2VudGVyID0gZnVuY3Rpb24oY2VudGVyKSB7XHJcbiAgdGhpcy5jZW50ZXJfID0gY2VudGVyO1xyXG59O1xyXG5cclxuXHJcbi8qKlxyXG4gKiBDcmVhdGUgdGhlIGNzcyB0ZXh0IGJhc2VkIG9uIHRoZSBwb3NpdGlvbiBvZiB0aGUgaWNvbi5cclxuICpcclxuICogQHBhcmFtIHtnb29nbGUubWFwcy5Qb2ludH0gcG9zIFRoZSBwb3NpdGlvbi5cclxuICogQHJldHVybiB7c3RyaW5nfSBUaGUgY3NzIHN0eWxlIHRleHQuXHJcbiAqL1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGUuY3JlYXRlQ3NzID0gZnVuY3Rpb24ocG9zKSB7XHJcbiAgdmFyIHN0eWxlID0gW107XHJcbiAgc3R5bGUucHVzaCgnYmFja2dyb3VuZC1pbWFnZTp1cmwoJyArIHRoaXMudXJsXyArICcpOycpO1xyXG4gIHZhciBiYWNrZ3JvdW5kUG9zaXRpb24gPSB0aGlzLmJhY2tncm91bmRQb3NpdGlvbl8gPyB0aGlzLmJhY2tncm91bmRQb3NpdGlvbl8gOiAnMCAwJztcclxuICBzdHlsZS5wdXNoKCdiYWNrZ3JvdW5kLXBvc2l0aW9uOicgKyBiYWNrZ3JvdW5kUG9zaXRpb24gKyAnOycpO1xyXG5cclxuICBpZiAodHlwZW9mIHRoaXMuYW5jaG9yXyA9PT0gJ29iamVjdCcpIHtcclxuICAgIGlmICh0eXBlb2YgdGhpcy5hbmNob3JfWzBdID09PSAnbnVtYmVyJyAmJiB0aGlzLmFuY2hvcl9bMF0gPiAwICYmXHJcbiAgICAgICAgdGhpcy5hbmNob3JfWzBdIDwgdGhpcy5oZWlnaHRfKSB7XHJcbiAgICAgIHN0eWxlLnB1c2goJ2hlaWdodDonICsgKHRoaXMuaGVpZ2h0XyAtIHRoaXMuYW5jaG9yX1swXSkgK1xyXG4gICAgICAgICAgJ3B4OyBwYWRkaW5nLXRvcDonICsgdGhpcy5hbmNob3JfWzBdICsgJ3B4OycpO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgc3R5bGUucHVzaCgnaGVpZ2h0OicgKyB0aGlzLmhlaWdodF8gKyAncHg7IGxpbmUtaGVpZ2h0OicgKyB0aGlzLmhlaWdodF8gK1xyXG4gICAgICAgICAgJ3B4OycpO1xyXG4gICAgfVxyXG4gICAgaWYgKHR5cGVvZiB0aGlzLmFuY2hvcl9bMV0gPT09ICdudW1iZXInICYmIHRoaXMuYW5jaG9yX1sxXSA+IDAgJiZcclxuICAgICAgICB0aGlzLmFuY2hvcl9bMV0gPCB0aGlzLndpZHRoXykge1xyXG4gICAgICBzdHlsZS5wdXNoKCd3aWR0aDonICsgKHRoaXMud2lkdGhfIC0gdGhpcy5hbmNob3JfWzFdKSArXHJcbiAgICAgICAgICAncHg7IHBhZGRpbmctbGVmdDonICsgdGhpcy5hbmNob3JfWzFdICsgJ3B4OycpO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgc3R5bGUucHVzaCgnd2lkdGg6JyArIHRoaXMud2lkdGhfICsgJ3B4OyB0ZXh0LWFsaWduOmNlbnRlcjsnKTtcclxuICAgIH1cclxuICB9IGVsc2Uge1xyXG4gICAgc3R5bGUucHVzaCgnaGVpZ2h0OicgKyB0aGlzLmhlaWdodF8gKyAncHg7IGxpbmUtaGVpZ2h0OicgK1xyXG4gICAgICAgIHRoaXMuaGVpZ2h0XyArICdweDsgd2lkdGg6JyArIHRoaXMud2lkdGhfICsgJ3B4OyB0ZXh0LWFsaWduOmNlbnRlcjsnKTtcclxuICB9XHJcblxyXG4gIHZhciB0eHRDb2xvciA9IHRoaXMudGV4dENvbG9yXyA/IHRoaXMudGV4dENvbG9yXyA6ICdibGFjayc7XHJcbiAgdmFyIHR4dFNpemUgPSB0aGlzLnRleHRTaXplXyA/IHRoaXMudGV4dFNpemVfIDogMTE7XHJcblxyXG4gIHN0eWxlLnB1c2goJ2N1cnNvcjpwb2ludGVyOyB0b3A6JyArIHBvcy55ICsgJ3B4OyBsZWZ0OicgK1xyXG4gICAgICBwb3MueCArICdweDsgY29sb3I6JyArIHR4dENvbG9yICsgJzsgcG9zaXRpb246YWJzb2x1dGU7IGZvbnQtc2l6ZTonICtcclxuICAgICAgdHh0U2l6ZSArICdweDsgZm9udC1mYW1pbHk6QXJpYWwsc2Fucy1zZXJpZjsgZm9udC13ZWlnaHQ6Ym9sZCcpO1xyXG4gIHJldHVybiBzdHlsZS5qb2luKCcnKTtcclxufTtcclxuXHJcblxyXG4vLyBFeHBvcnQgU3ltYm9scyBmb3IgQ2xvc3VyZVxyXG4vLyBJZiB5b3UgYXJlIG5vdCBnb2luZyB0byBjb21waWxlIHdpdGggY2xvc3VyZSB0aGVuIHlvdSBjYW4gcmVtb3ZlIHRoZVxyXG4vLyBjb2RlIGJlbG93LlxyXG52YXIgd2luZG93ID0gd2luZG93IHx8IHt9O1xyXG53aW5kb3dbJ01hcmtlckNsdXN0ZXJlciddID0gTWFya2VyQ2x1c3RlcmVyO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydhZGRNYXJrZXInXSA9IE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuYWRkTWFya2VyO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydhZGRNYXJrZXJzJ10gPSBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmFkZE1hcmtlcnM7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ2NsZWFyTWFya2VycyddID1cclxuICAgIE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuY2xlYXJNYXJrZXJzO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydmaXRNYXBUb01hcmtlcnMnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmZpdE1hcFRvTWFya2VycztcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsnZ2V0Q2FsY3VsYXRvciddID1cclxuICAgIE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0Q2FsY3VsYXRvcjtcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsnZ2V0R3JpZFNpemUnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmdldEdyaWRTaXplO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydnZXRFeHRlbmRlZEJvdW5kcyddID1cclxuICAgIE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0RXh0ZW5kZWRCb3VuZHM7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ2dldE1hcCddID0gTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRNYXA7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ2dldE1hcmtlcnMnXSA9IE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0TWFya2VycztcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsnZ2V0TWF4Wm9vbSddID0gTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRNYXhab29tO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydnZXRTdHlsZXMnXSA9IE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZ2V0U3R5bGVzO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydnZXRUb3RhbENsdXN0ZXJzJ10gPVxyXG4gICAgTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5nZXRUb3RhbENsdXN0ZXJzO1xyXG5NYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlWydnZXRUb3RhbE1hcmtlcnMnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLmdldFRvdGFsTWFya2VycztcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsncmVkcmF3J10gPSBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlZHJhdztcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsncmVtb3ZlTWFya2VyJ10gPVxyXG4gICAgTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5yZW1vdmVNYXJrZXI7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ3JlbW92ZU1hcmtlcnMnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlbW92ZU1hcmtlcnM7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ3Jlc2V0Vmlld3BvcnQnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlc2V0Vmlld3BvcnQ7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ3JlcGFpbnQnXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnJlcGFpbnQ7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ3NldENhbGN1bGF0b3InXSA9XHJcbiAgICBNYXJrZXJDbHVzdGVyZXIucHJvdG90eXBlLnNldENhbGN1bGF0b3I7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ3NldEdyaWRTaXplJ10gPVxyXG4gICAgTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZS5zZXRHcmlkU2l6ZTtcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsnc2V0TWF4Wm9vbSddID1cclxuICAgIE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuc2V0TWF4Wm9vbTtcclxuTWFya2VyQ2x1c3RlcmVyLnByb3RvdHlwZVsnb25BZGQnXSA9IE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUub25BZGQ7XHJcbk1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGVbJ2RyYXcnXSA9IE1hcmtlckNsdXN0ZXJlci5wcm90b3R5cGUuZHJhdztcclxuXHJcbkNsdXN0ZXIucHJvdG90eXBlWydnZXRDZW50ZXInXSA9IENsdXN0ZXIucHJvdG90eXBlLmdldENlbnRlcjtcclxuQ2x1c3Rlci5wcm90b3R5cGVbJ2dldFNpemUnXSA9IENsdXN0ZXIucHJvdG90eXBlLmdldFNpemU7XHJcbkNsdXN0ZXIucHJvdG90eXBlWydnZXRNYXJrZXJzJ10gPSBDbHVzdGVyLnByb3RvdHlwZS5nZXRNYXJrZXJzO1xyXG5cclxuQ2x1c3Rlckljb24ucHJvdG90eXBlWydvbkFkZCddID0gQ2x1c3Rlckljb24ucHJvdG90eXBlLm9uQWRkO1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGVbJ2RyYXcnXSA9IENsdXN0ZXJJY29uLnByb3RvdHlwZS5kcmF3O1xyXG5DbHVzdGVySWNvbi5wcm90b3R5cGVbJ29uUmVtb3ZlJ10gPSBDbHVzdGVySWNvbi5wcm90b3R5cGUub25SZW1vdmU7XHJcblxyXG5PYmplY3Qua2V5cyA9IE9iamVjdC5rZXlzIHx8IGZ1bmN0aW9uKG8pIHtcclxuICAgIHZhciByZXN1bHQgPSBbXTtcclxuICAgIGZvcih2YXIgbmFtZSBpbiBvKSB7XHJcbiAgICAgICAgaWYgKG8uaGFzT3duUHJvcGVydHkobmFtZSkpXHJcbiAgICAgICAgICByZXN1bHQucHVzaChuYW1lKTtcclxuICAgIH1cclxuICAgIHJldHVybiByZXN1bHQ7XHJcbn07XHJcblxyXG4vKiBlc2xpbnQtZW5hYmxlICovXHJcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvbW9kdWxlcy9tYXJrZXJjbHVzdGVyZXIuanMiXSwic291cmNlUm9vdCI6IiJ9