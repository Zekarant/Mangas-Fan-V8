import {waitLoadingPage} from "../utilities/wait-loading-page";

waitLoadingPage((): void => {
  const getAlertMessages = document.querySelectorAll('.alert-message .close-button');

  Array.from(getAlertMessages).forEach((element: HTMLElement): void => {
    element.addEventListener('click', (): void => {
      element.parentElement.remove();
    });
  });
});
