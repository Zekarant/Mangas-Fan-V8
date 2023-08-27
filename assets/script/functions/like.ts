import {postRequest} from "../ajax/request";
import {AjaxError} from "../error/ajax-error";
import {LikeResponse, LikeResponseCode} from "../models/like-response.model";

export function reactNews(newsId: number, reaction: string): void {
    sendReaction(`/news/${newsId}/reaction/${reaction}`, reaction, newsId);
}

function sendReaction(url: string, reaction: string, newsId: number): void {
    postRequest(url, null).then((data: LikeResponse): void => {
        updateReactionsCount(data, reaction, newsId);
    }).catch((error: AjaxError): void => {
        console.warn(error);
    });
}

function updateReactionsCount(response: LikeResponse, reaction: string, newsId: number): void {
    const { likes, dislikes } = response;
    const ACTIVE_CLASS = 'active';

    const dislikeCount = document.getElementById(`total-dislike-${newsId}`);
    const likeCount = document.getElementById(`total-like-${newsId}`);

    const dislikeButton = document.getElementById(`button-dislike-${newsId}`);
    const likeButton = document.getElementById(`button-like-${newsId}`);

    switch (response.message) {
        case LikeResponseCode.REACTION_ADDED:
        case LikeResponseCode.REACTION_SWITCHED: {
            if (reaction === 'like') {
                likeButton.classList.add(ACTIVE_CLASS);
                dislikeButton.classList.remove(ACTIVE_CLASS);
            } else {
                likeButton.classList.remove(ACTIVE_CLASS);
                dislikeButton.classList.add(ACTIVE_CLASS);
            }
            break;
        }

        case LikeResponseCode.REACTION_REMOVED: {
            likeButton.classList.remove(ACTIVE_CLASS);
            dislikeButton.classList.remove(ACTIVE_CLASS);
            break;
        }
    }

    dislikeCount.innerText = dislikes.toString();
    likeCount.innerText = likes.toString();
}
