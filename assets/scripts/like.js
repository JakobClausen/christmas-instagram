const likeButtons = document.querySelectorAll(".like-img");
const likeHearts = document.querySelectorAll(".like-heart-img");

likeButtons.forEach(button => {
  button.addEventListener("click", () => {
    button.classList.add("bookmark-liked-up");
    button.classList.remove("hover");

    setTimeout(() => {
      button.classList.add("bookmark-liked-down");
    }, 500);
  });
});

likeHearts.forEach(likeHeart => {
  likeHeart.addEventListener("click", () => {
    setTimeout(() => {
      likeHeart.classList.add("jakob");
      likeHeart.classList.remove("not-liked");
    }, 500);
  });
});
