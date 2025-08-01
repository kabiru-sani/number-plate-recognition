<style>
.loader {
  width: 20px;
  height: 20px;
  display: inline-block;
  position: relative;
}
.loader::after,
.loader::before {
  content: '';
  box-sizing: border-box;
  width: 20px;
  height: 20px;

  border-radius: 50%;
  border: 2px solid #FFF;
  position: absolute;
  left: 2px;
  top: 3px;
  animation: animloader 2s linear infinite;
}
.loader::after {
  animation-delay: 1s;
}

@keyframes animloader {
  0% {
    transform: scale(0);
    opacity: 1;
  }
  100% {
    transform: scale(1);
    opacity: 0;
  }
}
</style>
<span class="loader"></span>
