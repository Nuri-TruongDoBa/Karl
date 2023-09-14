// Function switch theme dark or light
function switchTheme() {
  let themeChangeButton = document.querySelector('[data-toggle=switch-theme]');
  if (themeChangeButton) {
    themeChangeButton.addEventListener("click", (e) => {
      let colorRootTheme = {
        "--admin-color-bg": "#2a2828",
        "--admin-color-bg-trans": "rgba(255, 255, 255, 0.5)",
        "--admin-color-icon": "#fff",
        "--admin-color-icon-bg": "rgba(9, 97, 155, 0.4)",
        "--admin-color-icon-hover": "rgba(9, 97, 155, 0.8)",
      },
      iconElement = document.querySelector('[data-toggle=switch-theme] i'),
      pathLogo = '../../media/images/admin/flogo.svg';

      if (iconElement) {
        if (is(iconElement, ".fa-moon")) {
          colorRootTheme = {
            "--admin-color-bg": "#fff",
            "--admin-color-bg-trans": "#fff",
            "--admin-color-icon": "#2a2828",
            "--admin-color-icon-bg": 'rgba(218, 221, 70, 0.4)',
            "--admin-color-icon-hover": 'rgba(218, 221, 70, 0.8)'
          };
          pathLogo = '../../media/images/admin/logo.svg'
        }

        let logoHeaderElement = document.querySelector('header.admin-header .header-left .header-left__logoImage');
        if (logoHeaderElement) {
            logoHeaderElement.src = pathLogo;
        }

        setRootVariableCss(colorRootTheme);
        toggleClass(iconElement, "fa-sun fa-moon");
      }
    });
  }
}

switchTheme();

// Set position for popover element
function setPositionPopover()
{
  let popoverCoupleElements = {'#notifyBox': '#notifyList'};
  Object.entries(popoverCoupleElements).forEach(el => {
    let baseElem = document.querySelector(el[0]);
    if (baseElem) {
      let r = getStyle(document.body, 'width') - baseElem.getBoundingClientRect().right + 15;
      let poElem = document.querySelector(el[1]);

      if(poElem) {
        poElem.style.right = r + 'px';
      }
    }
  });
}

setPositionPopover();
