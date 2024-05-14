import {AjaxError} from '../error/ajax-error';
import {postRequest} from '../ajax/request';
import {waitLoadingPage} from '../utilities/wait-loading-page';

waitLoadingPage((): void => {
  document.querySelector('form.comment-form')?.addEventListener('submit', (event: Event) => {
    event.preventDefault();

    postRequest('/ajax/comments', new FormData(event.target as HTMLFormElement))
      .then((response: any): void => {
        const commentList = document.querySelector('.comments-list');
        const commentContent = document.getElementById('comment_content') as HTMLInputElement; // #comment_content is generate by symfony when creating form

        const newElement = document.createElement('div');
        newElement.innerHTML = response.message;
        commentList.appendChild(newElement);

        commentList.lastElementChild.scrollIntoView();
        commentContent.value = '';
      })
      .catch((error: AjaxError): void => {
        console.warn(error.codeError);
      });
  });
});