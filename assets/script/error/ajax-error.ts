import {ErrorEnum} from '../enum/error.enum';

export class AjaxError extends Error {
  codeError: ErrorEnum;

  constructor(message: string, codeError: ErrorEnum) {
    super(message);
    this.codeError = codeError;
  }
}