import {waitLoadingPage} from "../utilities/wait-loading-page";

waitLoadingPage((): void => {
  const searchBar = document.getElementById('navbar-search');
  let timeoutId;

  const handleInputChange = (event: any): void => {
    const inputValue = event.target.value;

    if (timeoutId) {
      clearTimeout(timeoutId);
    }

    timeoutId = setTimeout((): void => {
      console.log({inputValue});
    }, 500);
  };

  searchBar.addEventListener('input', handleInputChange);
});