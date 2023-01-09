export enum ErrorEnum {
  NEWS_NOT_FOUND = 'La news n\'existe pas.',
  INVALID_CSRF_TOKEN = 'Le token CSRF est invalide.',
  USER_NOT_REGISTERED = 'L\'utilisateur n\'est pas connecté !'
}

export function mapStringToErrorEnum(codeError: string): ErrorEnum | null {
  const matchingKey = Object.keys(ErrorEnum).find(key => key === codeError);

  if (matchingKey) {
    return ErrorEnum[matchingKey] as ErrorEnum;
  }

  return null;
}