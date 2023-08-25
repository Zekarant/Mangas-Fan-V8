import {Button} from "./button";

export class VoteButton extends Button {

  constructor(private htmlButtonElement: HTMLElement) {
    super();
  }

  elementToUpdateClass(): HTMLElement {
    return this.htmlButtonElement.firstElementChild as HTMLElement;
  }

  buttonClassesActive(): string[] {
    return ['active', 'fa-solid'];
  }

  buttonClassesInactive(): string[] {
    return ['fa-regular'];
  }

  setCount(totalVotes: number): void {
    this.htmlButtonElement.querySelector('span').innerText = `${totalVotes}`;
  }
}