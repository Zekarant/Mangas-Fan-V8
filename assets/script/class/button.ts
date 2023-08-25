export abstract class Button {

  abstract elementToUpdateClass(): HTMLElement;

  abstract buttonClassesActive(): string[];
  abstract buttonClassesInactive(): string[];

  manageClassButton(isActive: boolean): void {
    if (isActive) {
      this.elementToUpdateClass().classList.remove(...this.buttonClassesInactive());
      this.elementToUpdateClass().classList.add(...this.buttonClassesActive());
    } else {
      this.elementToUpdateClass().classList.remove(...this.buttonClassesActive());
      this.elementToUpdateClass().classList.add(...this.buttonClassesInactive());
    }
  }
}