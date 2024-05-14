import {ReactionEnum} from "../enum/reaction.enum";
import {LikeResponse} from "../models/like-response.model";
import {postRequest} from "../ajax/request";

export const postNewVoteByNewsId = (newsId: string, reaction: ReactionEnum): Promise<LikeResponse> => {
  const apiUrl = `/news/${newsId}/reaction/${reaction}`;

  return postRequest(apiUrl);
}