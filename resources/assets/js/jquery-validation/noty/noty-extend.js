'use strict';

/**
 *
 * @module
 */

// ----------------------------------------
// Imports
// ----------------------------------------

import Noty from 'noty';
import './noty-extend.scss';

// ----------------------------------------
// Private
// ----------------------------------------

Noty.overrideDefaults({
	theme: 'mint',
	layout: 'bottomRight',
	timeout: 5000,
	progressBar: true,
	closeWith: ['click']
});

// ----------------------------------------
// Exports
// ----------------------------------------

export default Noty;
