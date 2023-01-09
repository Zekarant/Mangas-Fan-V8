import { showError } from '../functions/show-error';

export async function getRequest(route: string, callback: Function): Promise<void> {
  try {
    const response = await fetch(route, {
      method: 'GET'
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