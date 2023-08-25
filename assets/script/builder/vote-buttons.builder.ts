import {ReactionEnum} from "../enum/reaction.enum";
import {postNewVoteByNewsId} from "../api/news.http";
import {LikeResponse, LikeResponseCode} from "../models/like-response.model";
import {AjaxError} from "../error/ajax-error";
import {VoteButton} from "../class/vote-button";

export class VoteButtonsBuilder {

  private likeButtons = document.getElementsByClassName('news-like-clickable');
  private dislikeButtons = document.getElementsByClassName('news-dislike-clickable');

  constructor() {
    this.addClickEventOnAllButtons(this.likeButtons, ReactionEnum.LIKE);
    this.addClickEventOnAllButtons(this.dislikeButtons, ReactionEnum.DISLIKE);
  }

  /**
   * Method for associating an action for each button
   * @param buttons
   * @param reaction
   */
  private addClickEventOnAllButtons(buttons: HTMLCollection, reaction: ReactionEnum): void {
    Array.from(buttons).forEach((element: HTMLElement): void => {
      element.addEventListener('click', () => this.onButtonNewsClick(element, reaction));
    });
  }

  /**
   * Method executing an AJAX request to submit a vote
   * @param element
   * @param reaction
   */
  private onButtonNewsClick(element: HTMLElement, reaction: ReactionEnum): void {
    const newsId = element?.dataset?.id;

    if (!newsId) {
      return;
    }

    postNewVoteByNewsId(newsId, reaction).then((likeResponse: LikeResponse): void => {
      this.updateReactionsCount(likeResponse, reaction, newsId);
    }).catch((error: AjaxError): void => {
      console.warn(error);
    });
  }

  /**
   * Method that update the style and vote count for all vote buttons
   * @param response
   * @param reaction
   * @param newsId
   */
  private updateReactionsCount(response: LikeResponse, reaction: string, newsId: string): void {
    const {likes, dislikes} = response;

    const likeButton = new VoteButton(this.getAssociatedButton(newsId, this.likeButtons));
    const dislikeButton = new VoteButton(this.getAssociatedButton(newsId, this.dislikeButtons));

    switch (response.message) {
      case LikeResponseCode.REACTION_ADDED:
      case LikeResponseCode.REACTION_SWITCHED: {
        if (reaction === ReactionEnum.LIKE) {
          likeButton.manageClassButton(true);
          dislikeButton.manageClassButton(false);
        } else {
          likeButton.manageClassButton(false);
          dislikeButton.manageClassButton(true);
        }
        break;
      }

      case LikeResponseCode.REACTION_REMOVED: {
        likeButton.manageClassButton(false);
        dislikeButton.manageClassButton(false);

        break;
      }
    }

    likeButton.setCount(likes);
    dislikeButton.setCount(dislikes);
  }

  /**
   * Method to get the HTMLElement associated with the target news id
   * @param newsId
   * @param buttons
   */
  private getAssociatedButton(newsId: string, buttons: HTMLCollection): HTMLElement {
    return Array.from(buttons).find((element: HTMLElement): boolean => element?.dataset?.id === newsId) as HTMLElement;
  }
}