import { postRequest } from '../ajax/post-request';
import { waitLoadingPage } from '../functions/wait-loading-page';

waitLoadingPage((): void => {
  document.querySelector('form.comment-form')?.addEventListener('submit', (event: Event) => {
    event.preventDefault();

    postRequest('/ajax/comments', new FormData(event.target as HTMLFormElement), (json: any): void => {
      const commentList = document.querySelector('.comments-list');
      const commentContent = document.getElementById('comment_content') as HTMLInputElement; // #comment_content is generate by symfony when creating form

      const newElement = document.createElement('div');
      newElement.innerHTML = json.message;
      commentList.insertBefore(newElement, commentList.firstElementChild);

      commentList.firstElementChild.scrollIntoView();
      commentContent.value = '';
    }).then();
  })
});