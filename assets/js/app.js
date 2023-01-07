// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';
import '../css/navbar.scss';
import '../css/news.scss';

document.addEventListener('DOMContentLoaded', () => {
    new App();
});


class App {
    constructor() {
        this.handleCommentForm();
    }

    handleCommentForm(){

        const commentForm = document.querySelector('form.comment-form');

        if(null === commentForm){
            return;
        }

        commentForm.addEventListener('submit', async(event) => {
            event.preventDefault();

            const response = await fetch('/ajax/comments', {
                method: 'POST',
                body: new FormData(event.target)
            });

            if(!response.ok){
                return;
            }

            const json = await response.json();
            if(json.code === "COMMENT_ADDED_SUCCESSFULLY"){
                const commentList = document.querySelector('.comments-list');
                const commentContent = document.querySelector('#comment_content');
                commentList.insertAdjacentHTML('beforebegin', json.message);
                commentList.lastElementChild.scrollIntoView();
                commentContent.value = '';
            }
        });
    }
}