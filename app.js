const observer = new IntersectionObserver((entry) => {
  const elem = entry[0]
  if (elem.isIntersecting) elem.target.classList.add("show")
})

const hiddenElem = document.querySelector(".hidden")
observer.observe(hiddenElem)