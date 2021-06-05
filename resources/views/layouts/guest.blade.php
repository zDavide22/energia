<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('/images/logo/energia/logo_small_icon_only_inverted.png') }}">
        <title>Energy+</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            .bolt {
  --bolt: rgb(242, 222, 16);
  width: 126px;
  height: 186px;
  position: relative;
}
.bolt svg {
  position: absolute;
  display: block;
  stroke-width: 4;
  fill: none;
  stroke-linecap: round;
  stroke: var(--bolt);
}
.bolt svg.circle {
  left: 7px;
  top: 100%;
  width: 112px;
  height: 44px;
  stroke-dashoffset: 179px;
  stroke-dasharray: 0px 178px;
}
.bolt svg.line {
  --r: 0deg;
  top: 95%;
  width: 70px;
  height: 3px;
  stroke-dashoffset: 71px;
  stroke-dasharray: 0px 70px;
  transform: rotate(var(--r));
}
.bolt svg.line.left {
  --r: 130deg;
  left: -24px;
}
.bolt svg.line.right {
  --r: 40deg;
  right: -24px;
}
.bolt svg.white {
  --r: 0deg;
  --s: 1;
  top: 30%;
  z-index: 1;
  stroke: #fff;
  stroke-dashoffset: 241px;
  stroke-dasharray: 0px 240px;
  transform: rotate(var(--r)) scaleX(var(--s));
}
.bolt svg.white.left {
  --r: -20deg;
  left: 0;
}
.bolt svg.white.right {
  --r: 20deg;
  --s: -1;
  right: 0;
}
.bolt div {
  display: block;
  position: relative;
}
.bolt div:before, .bolt div:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 44%;
}
.bolt div:before {
  width: 112px;
  height: 112px;
  margin: -56px 0 0 -56px;
  background: #CDD9ED;
  filter: blur(124px);
}
.bolt div:after {
  width: 64px;
  height: 64px;
  margin: -32px 0 0 -32px;
  background: #FFF9BC;
  z-index: 1;
  filter: blur(60px);
}
.bolt div span {
  display: block;
  width: 106px;
  height: 186px;
  background: var(--bolt);
  -webkit-clip-path: polygon(80% 0%, 80% 0, 60% 45%, 90% 45%, 20% 100%, 40% 57%, 10% 57%);
          clip-path: polygon(80% 0%, 80% 0, 60% 45%, 90% 45%, 20% 100%, 40% 57%, 10% 57%);
}
.bolt.animate div:before, .bolt.animate div:after {
  -webkit-animation: shine 2s ease;
          animation: shine 2s ease;
}
.bolt.animate div span {
  -webkit-animation: morph 2s ease;
          animation: morph 2s ease;
}
.bolt.animate svg.circle {
  -webkit-animation: circle 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.3s;
          animation: circle 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.3s;
}
.bolt.animate svg.line {
  -webkit-animation: line 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.3s;
          animation: line 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.3s;
}
.bolt.animate svg.white {
  -webkit-animation: white 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.45s;
          animation: white 0.45s cubic-bezier(0.77, 0, 0.175, 1) forwards 1.45s;
}
.bolt.animate svg.white.right {
  -webkit-animation-delay: 1.6s;
          animation-delay: 1.6s;
}

@-webkit-keyframes circle {
  100% {
    stroke-dasharray: 178px 178px;
  }
}

@keyframes circle {
  100% {
    stroke-dasharray: 178px 178px;
  }
}
@-webkit-keyframes white {
  100% {
    stroke-dasharray: 240px 240px;
  }
}
@keyframes white {
  100% {
    stroke-dasharray: 240px 240px;
  }
}
@-webkit-keyframes line {
  100% {
    stroke-dasharray: 70px 70px;
  }
}
@keyframes line {
  100% {
    stroke-dasharray: 70px 70px;
  }
}
@-webkit-keyframes shine {
  30%, 70% {
    opacity: 0;
  }
}
@keyframes shine {
  30%, 70% {
    opacity: 0;
  }
}
@-webkit-keyframes morph {
  12% {
    -webkit-clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
            clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
  }
  24%, 72% {
    -webkit-clip-path: polygon(36% 40%, 82% 40%, 82% 40%, 82% 40%, 36% 71%, 36% 40%, 36% 40%);
            clip-path: polygon(36% 40%, 82% 40%, 82% 40%, 82% 40%, 36% 71%, 36% 40%, 36% 40%);
  }
  84% {
    -webkit-clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
            clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
  }
}
@keyframes morph {
  12% {
    -webkit-clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
            clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
  }
  24%, 72% {
    -webkit-clip-path: polygon(36% 40%, 82% 40%, 82% 40%, 82% 40%, 36% 71%, 36% 40%, 36% 40%);
            clip-path: polygon(36% 40%, 82% 40%, 82% 40%, 82% 40%, 36% 71%, 36% 40%, 36% 40%);
  }
  84% {
    -webkit-clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
            clip-path: polygon(24% 50%, 100% 0, 65% 40%, 65% 40%, 8% 100%, 24% 50%, 24% 50%);
  }
}
* {
  box-sizing: inherit;
}
*:before, *:after {
  box-sizing: inherit;
}

.divbolt{
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #0C0F17;
}
.divbolt .dribbble {
  position: fixed;
  display: block;
  right: 24px;
  bottom: 24px;
}
.divbolt .dribbble img {
  display: block;
  width: 76px;
}
</style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

  <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js'></script>
      <script id="rendered-js" >
$('.bolt').each(function (e) {

  var bolt = $(this),
  div = $(this).children('div');

  bolt.addClass('animate');

  var tween = new TimelineMax({
    onComplete() {
      bolt.removeClass('animate');
      repeat();
    } }).
  set(div, {
    rotation: 360 }).
  to(div, .7, {
    y: 80,
    rotation: 370 }).
  to(div, .6, {
    y: -140,
    rotation: 20 }).
  to(div, .1, {
    rotation: -24,
    y: 80 }).
  to(div, .8, {
    ease: Back.easeOut.config(1.6),
    rotation: 0,
    y: 0 });


  function repeat() {
    setTimeout(() => {
      bolt.addClass('animate');
    }, 400);
  }

});
</script>
    </body>
</html>
