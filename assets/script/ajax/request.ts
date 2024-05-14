import {mapStringToErrorEnum} from '../helper/error.helper';
import {AjaxError} from '../error/ajax-error';

export async function getRequest(route: string): Promise<any> {
  const response = await fetch(route, {
    method: 'GET'
  });

  return responseRequest(response);
}

export async function postRequest(route: string, body?: any): Promise<any> {
  const response = await fetch(route, {
    body,
    method: 'POST',
  });

  return responseRequest(response);
}

async function responseRequest(response: Response): Promise<any> {
  const data = await response.json();

  if (response?.ok) {
    return data;
  }

  throw new AjaxError(`Request failed with status: ${response.status}`, mapStringToErrorEnum(data.code));
}
