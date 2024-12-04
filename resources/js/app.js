// import './bootstrap';
// import './success-message.js';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import './bootstrap'; // Existing imports
import './success-message.js';

import Alpine from 'alpinejs'; // Existing Alpine.js
import React from 'react';     // Add React
import ReactDOM from 'react-dom'; // Add ReactDOM

window.Alpine = Alpine; // Initialize Alpine.js
Alpine.start(); // Start Alpine.js

// Render the React component into the DOM element with the ID 'app'
// ReactDOM.render(
//   <React.StrictMode>
//     <App />
//   </React.StrictMode>,
//   document.getElementById('app') // The root element where React will mount
// );

