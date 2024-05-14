export function waitLoadingPage(callback: Function): void {
    document.addEventListener('DOMContentLoaded', () => callback());
}
