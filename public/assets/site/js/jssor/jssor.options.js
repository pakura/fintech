jQuery(document).ready(function ($) {
    // Define an array of slideshow transition code
    var _SlideshowTransitions = [
        {$Duration:700,$Opacity:2,$Brother:{$Duration:1000,$Opacity:2}}
    ];

    // Define an array of caption transition code
    var _CaptionTransitions = [
        {$Duration:800,$Opacity:2}
    ];

    var options = {
        $AutoPlay: true,
        $AutoPlayInterval: 4000,
        $SlideDuration: 800,
        $DragOrientation: 1,
        $ArrowKeyNavigation: 1,
        $PauseOnHover: 1,

        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: _SlideshowTransitions,
            $TransitionsOrder: 1,
            $ShowLink: true
        },

        $CaptionSliderOptions: {
            $Class: $JssorCaptionSlider$,
            $CaptionTransitions: _CaptionTransitions,
            $PlayInMode: 1,
            $PlayOutMode: 3
        },

        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $ChanceToShow: 2,
            $AutoCenter: 0
        }

        // $ThumbnailNavigatorOptions: {
        //     $Class: $JssorThumbnailNavigator$,
        //     $DisplayPieces: 6,
        //     $Orientation: 2,
        //     $SpacingX: 0,
        //     $SpacingY: 0,
        //     $AutoCenter: 0
        // }
    };

    // ID of the slider
    var id = 'slider';

    // initialize slider
    var jssorSlider = new $JssorSlider$(id, options);

    // responsive begin
    // you can remove responsive code if you don't want the slider scales
    // while window resizing
    function scaleSlider() {
        var parentWidth = $('#' + id).parent().width();

        if (parentWidth) {
            jssorSlider.$ScaleWidth(parentWidth);
        } else {
            window.setTimeout(scaleSlider, 30);
        }
    }

    // Scale slider after document ready
    scaleSlider();
                                    
    // Scale slider while window load/resize/orientationchange.
    $(window).bind("load", scaleSlider);
    $(window).bind("resize", scaleSlider);
    $(window).bind("orientationchange", scaleSlider);
    // responsive end
});