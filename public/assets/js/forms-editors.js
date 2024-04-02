"use strict";
new Quill("#snow-editor", {
    bounds: "#snow-editor",
    modules: {
        formula: !0,
        toolbar: "#snow-toolbar"
    },
    theme: "snow"
});