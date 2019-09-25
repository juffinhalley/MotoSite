'use strict';

class ajax {
	constructor (data) {
		this.xhr = new XMLHttpRequest();
		this.url = data.url;
		this.type = data.type || 'GET';
		this.response = data.response;
		this.dataParam = data.data || {};

		this.xhr.open(this.type, this.url, true);

		// this.xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		this.xhr.send();

		const _this = this;

		this.xhr.onreadystatechange = function(evt) { 
			if (_this.xhr.readyState != 4) {
				return;
			}
			if (_this.xhr.status != 200) {
				console.warn("200! something get wrong");
			} else {
				let {status, statusText, response} = _this.xhr;
				console.log(response);

				if (typeof response === 'string') {
					response = JSON.parse(response);
				}

				_this.formUrl();
				// _this.response();
			}
		}
	}

	formUrl () {
		console.log(this.dataParam);
	}
};

export default ajax;
