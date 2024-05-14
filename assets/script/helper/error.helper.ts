import {ErrorEnum} from "../enum/error.enum";

export function mapStringToErrorEnum(codeError: string): ErrorEnum | null {
  const matchingKey = Object.keys(ErrorEnum).find(key => key === codeError);

  if (matchingKey) {
    return ErrorEnum[matchingKey] as ErrorEnum;
  }

  return null;
}
