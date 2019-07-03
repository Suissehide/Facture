(function () {
    $(document).ready(function () {
        var blue10, count, green10, purple10, red10, resetAllSubs, transformation;
        count = 0;
        // Colors
        blue10 = "rgba(0, 168, 255, .2)";
        red10 = "rgba(255, 96, 95, .2)";
        green10 = "rgba(150, 209, 0, .2)";
        purple10 = "rgba(208, 102, 250, .2)";

        $(".blue").on("mouseover", function () {
            resetAllSubs();
            $(".blueSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            $(".inv__fluid").css({
                "background": blue10,
                "transition-delay": "0s"
            });

        });
        $(".red").on("mouseover", function () {
            resetAllSubs();
            $(".redSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            $(".inv__fluid").css({
                "background": red10,
                "transition-delay": "0s"
            });

        });
        $(".green").on("mouseover", function () {
            resetAllSubs();
            $(".greenSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            $(".inv__fluid").css({
                "background": green10,
                "transition-delay": "0s"
            });

        });
        $(".purple").on("mouseover", function () {
            resetAllSubs();
            $(".purpleSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            $(".inv__fluid").css({
                "background": purple10,
                "transition-delay": "0s"
            });

        });

        resetAllSubs = function () {
            $(".blueSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            $(".redSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            $(".greenSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            $(".purpleSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

        };
    });

}).call(this);