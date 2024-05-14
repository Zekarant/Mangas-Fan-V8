import {waitLoadingPage} from "../utilities/wait-loading-page";
import {VoteButtonsBuilder} from "../builder/vote-buttons.builder";

waitLoadingPage((): void => {
  new VoteButtonsBuilder();
});
