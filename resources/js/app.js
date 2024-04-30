import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

var firebaseConfig = {
    apiKey: "your-apiKey",
    authDomain: "your-authDomain",
    databaseURL: "https://adel-c3f30-default-rtdb.firebaseio.com/",
    projectId: "your-projectId",
    storageBucket: "your-storageBucket",
    messagingSenderId: "your-messagingSenderId",
    appId: "your-appId",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
