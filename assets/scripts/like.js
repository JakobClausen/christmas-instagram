const likeButtons = document.querySelectorAll(".like-img");
const likeHearts = document.querySelectorAll(".like-heart-img");
const likeForms = document.querySelectorAll(".like-form");
const likeNumbers = document.querySelectorAll(".post-likes");

likeButtons.forEach(likeButton => {
  likeButton.addEventListener("click", () => {
    likeButton.classList.add("bookmark-liked-up");
    likeButton.classList.remove("hover");

    const likeHeart = likeButton.childNodes[3];
    console.log(likeHeart);

    setTimeout(() => {
      likeButton.classList.add("bookmark-liked-down");
      likeHeart.classList.add("like-heart-img-active");
    }, 500);
  });
});
