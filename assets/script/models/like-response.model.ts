export interface LikeResponse {
    likes: number;
    dislikes: number;
    message: LikeResponseCode;
}

export enum LikeResponseCode {
    REACTION_SWITCHED = 'reaction-switched',
    REACTION_REMOVED = 'reaction-removed',
    REACTION_ADDED = 'reaction-added'
}