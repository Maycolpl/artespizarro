//control video

var video_ap = document.querySelector(".video-ap");
var btn_play = document.querySelector(".v-play");
var btn_mute = document.querySelector(".v-mute");

var toggle_mute = document.querySelector(".toggle-mute");
var toggle_play = document.querySelector(".toggle-play");

btn_play.addEventListener("click",playVideo);
btn_mute.addEventListener("click",muteVideo);

function playVideo()
{
    if(video_ap.paused)
    {
        video_ap.play();
        toggle_play.src = "assets/img/pause.png";
    }
    else
    {
        video_ap.pause();
        toggle_play.src = "assets/img/play.png";
    }
    
}
function muteVideo()
{
    if(video_ap.muted)
    {
        video_ap.muted = false;
        toggle_mute.src = "assets/img/unmute.png";
    }
    else
    {
        video_ap.muted = true;
        toggle_mute.src = "assets/img/mute.png";
    }
}