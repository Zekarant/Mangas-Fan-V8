import { showError } from '../functions/show-error';

export async function postRequest(route: string, body: any, callback: Function): Promise<void> {
  try {
    const response = await fetch(route, {
      body,
      method: 'POST',
    });
    const data = await response.json();

    if (response?.ok) {
      callback(data);
    } else {
      showError(data);
    }
  } catch (error: any) {
    showError(error);
  }
}