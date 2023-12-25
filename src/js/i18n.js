import { i18next } from '/src/node_modules/i18next';
import { Fetch } from '/src/node_modules/i18next-fetch-backend';

const DEFAULT_OPTIONS = {
    flagList: {
        pl: 'flag-poland',
        en: 'flag-united-kingdom',
        ua: 'flag-ukraine',
        ru: 'flag-russia',
        de: 'flag-germany',
    },
    preloadLngs: ['pl'],
    fallbackLng: "pl",
    loadPath: '../locales/{{lng}}.json',
}

class Translator {
    constructor(options = {}) {
        this._options = {...DEFAULT_OPTIONS, ...options}
        this._currentLng = this._options.fallbackLng;

        this._i18nextInit();
        this._listenToLangChange();
}

_i18nextInit() {
    i18next
    .use(Fetch)
    .init({
        fallbackLng: this._options.fallbackLng,
        preload: this._options.preloadLngs,
        backend: {
        loadPath: this._options.loadPath,
        stringify: JSON.stringify,
        }
    }).then(() => {
        this._translateAll();
    });
}

_listenToLangChange = () => {
    const langSwitchers = document.querySelectorAll('[data-i18n-switcher]');

    langSwitchers.forEach((langSwitcher) => {
    langSwitcher.addEventListener('click', () => {
        this._currentLng = langSwitcher.dataset.i18nLang;

        i18next.changeLanguage(this._currentLng).then(() => {
        this._translateAll();
        this._setPickedLanguageFlag();
        });
    })
    });
}

_translateAll = () => {
    const elementsToTranslate = document.querySelectorAll('[data-i18n]');

    elementsToTranslate.forEach((el) => {
    const key = el.dataset.i18n;

    el.innerHTML = i18next.t(key);
    })
}

_setPickedLanguageFlag = () => {
        const flagIcon = document.getElementById('selected-lang-flag');
        const oldFlagClass = flagIcon.classList.value.match(/\bflag-\S+/)[0];
        const newFlagClass = this._options.flagList[this._currentLng]

        flagIcon.classList.replace(oldFlagClass, newFlagClass);
    };
}

export default Translator;