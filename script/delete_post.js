const deletePost = (e) => {
    console.log('delete')
    // const postId = e.target.parentElement.parentElement.parentElement.dataset.id
    const post = e.target.parentElement.parentElement.parentElement
    const postId = post.dataset.postid

    console.log(postId)

    //Send data to backend 
    const JSONBody = {
        postId: postId
    }

    window.fetch('../account/delete_post.php', {
        body: JSON.stringify(JSONBody),
        method: 'post',
        credentials: 'include'
    }).then(response => response.text())
        .then(text => {
            location.reload();
        })

}

const clickHandleDeletePost = (event) => {
        
        const box = new ConfirmationBox('Are you sure you want to delete your post?', 'Keep it', 'Delete it')
        box.createPopUp()
        .then((message)=>{
            console.log(message)
        })
        .catch((message)=>{
            console.log(message)
            deletePost(event)
        })
}

document.querySelectorAll('.post-delete-button').forEach((button) => {
    button.addEventListener('click', clickHandleDeletePost)
})