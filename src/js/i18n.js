import i18next from 'i18next';
import Fetch from 'i18next-fetch-backend';

const DEFAULT_OPTIONS = {
    flagList: {
        en: 'flag-united-kingdom',
        pl: 'flag-poland',
        ja: 'flag-japan',
        de: 'flag-germany',
    },
    preloadLngs: ['en'],
    fallbackLng: "en",
    loadPath: 'locales/{{lng}}.json',
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
        this._initComponents(); // Remove this method if you are using the MDB Free version
    });
}

_listenToLangChange = () => {
    const langSwitchers = document.querySelectorAll('[data-i18n-switcher]');

    langSwitchers.forEach((langSwitcher) => {
    langSwitcher.addEventListener('click', () => {
        this._currentLng = langSwitcher.dataset.i18nLang;

        i18next.changeLanguage(this._currentLng).then(() => {
        this._translateAll();
        this._reinitComponents(); // Remove this method if you are using the MDB Free version
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

// Remove this method if you are using the MDB Free version
_initComponents = () => {
    const popconfirm = document.querySelector('#popconfirm');

    new mdb.Popconfirm(popconfirm, {
    message: i18next.t('popconfirm.message'),
    cancelText: i18next.t('popconfirm.cancelText'),
    okText: i18next.t('popconfirm.okText'),
    });
}

// Remove this method if you are using the MDB Free version
_reinitComponents = () => {
    const popconfirm = document.querySelector('#popconfirm');

    mdb.Popconfirm.getOrCreateInstance(popconfirm).dispose();
    this._initComponents();
}

_setPickedLanguageFlag = () => {
        const flagIcon = document.getElementById('selected-lang-flag');
        const oldFlagClass = flagIcon.classList.value.match(/\bflag-\S+/)[0];
        const newFlagClass = this._options.flagList[this._currentLng]

        flagIcon.classList.replace(oldFlagClass, newFlagClass);
    };
}

export default Translator;