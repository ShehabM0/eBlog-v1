const observer = new IntersectionObserver((entry) => {
  const elem = entry[0]
  if (elem.isIntersecting) elem.target.classList.add("show")
})
const hiddenElem = document.querySelector(".hidden")
if(hiddenElem) observer.observe(hiddenElem)


let createPost_switcherFlag = true
let editPost_flag = false // prevent createPost window activation in case editPost window is active

const createPost = document.getElementById('create-post')
if(createPost)
{
  createPost.addEventListener('click', () => {
    const modal = document.querySelectorAll('.create-modal')
    if(!editPost_flag)
    {
      if(createPost_switcherFlag) activeModal(modal)
      else inactiveModel(modal)
    }
  })
}
const editPost = document.getElementById('edit-post')
if(editPost)
{
  editPost.addEventListener('click', () => {
    const modal = document.querySelectorAll('.edit-modal')
    editPost_flag = true
    activeModal(modal)
  })
}

const createClose_btn = document.getElementById('create-close-btn')
if(createClose_btn)
{
  createClose_btn.addEventListener('click', () => {
    const modal = document.querySelectorAll('.create-modal')
    inactiveModel(modal)
  })
}
const editClose_btn = document.getElementById('edit-close-btn')
if(editClose_btn)
{
  editClose_btn.addEventListener('click', () => {
    const modal = document.querySelectorAll('.edit-modal')
    editPost_flag = false
    inactiveModel(modal)
  })
}

function activeModal(modal) {
  if(modal == null) return
  modal.forEach(elem => elem.classList.add('active'))
  createPost_switcherFlag = false
}
function inactiveModel(modal) {
  if(modal == null) return
  modal.forEach(elem => elem.classList.remove('active'))
  createPost_switcherFlag = true
}