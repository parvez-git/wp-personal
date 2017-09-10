
(function($){
    $(document).ready(function() {

        $("#_devcan_gallery_format").hide();
        $("#_devcan_image_format").hide();
        $("#_devcan_aside_format").hide();
        $("#_devcan_video_format").hide();
        $("#_devcan_audio_format").hide();
        $("#_devcan_link_format").hide();
        $("#_devcan_quote_format").hide();

        $('input:radio[name=post_format]').change(function() {
            if (this.value == 'gallery') {
                $("#_devcan_gallery_format").show();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'image') {
                $("#_devcan_image_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'aside') {
                $("#_devcan_aside_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'video') {
                $("#_devcan_video_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'audio') {
                $("#_devcan_audio_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'link') {
                $("#_devcan_link_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_quote_format").hide();
            }else if (this.value == 'quote') {
                $("#_devcan_quote_format").show();
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
            }else{
                $("#_devcan_gallery_format").hide();
		        $("#_devcan_image_format").hide();
		        $("#_devcan_aside_format").hide();
		        $("#_devcan_video_format").hide();
		        $("#_devcan_audio_format").hide();
		        $("#_devcan_link_format").hide();
		        $("#_devcan_quote_format").hide();
		    }
        });

        if ($("#post-format-gallery").attr("checked")){
            $("#_devcan_gallery_format").show();
        }
        else if ($("#post-format-image").attr("checked")){
            $("#_devcan_image_format").show();
        }
        else if ($("#post-format-aside").attr("checked")){
            $("#_devcan_aside_format").show();
        }
        else if ($("#post-format-video").attr("checked")){
            $("#_devcan_video_format").show();
        }
        else if ($("#post-format-audio").attr("checked")){
            $("#_devcan_audio_format").show();
        }
        else if ($("#post-format-link").attr("checked")){
            $("#_devcan_link_format").show();
        }
        else if ($("#post-format-quote").attr("checked")){
            $("#_devcan_quote_format").show();
        }

    });
})(jQuery);
