const storageType = localStorage;
const consentPropertyName = 'mallexpress_consent';

const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
const savetoStorage = () => storageType.setItem(consentPropertyName, true);

window.onload = () => {
    if (shouldShowPopup()) {
        const consent = confirm('Agree to allow Mall Express collect cookies')
        if (consent) {
            savetoStorage();
        }
    }
}