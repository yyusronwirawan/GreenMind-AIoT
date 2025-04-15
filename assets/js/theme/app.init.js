var theme = sessionStorage.getItem("theme") || "light";

var userSettings = {
  Layout: "vertical", // vertical | horizontal
  SidebarType: "full", // full | mini-sidebar
  BoxedLayout: true, // true | false
  Direction: "ltr", // ltr | rtl
  Theme: theme, // light | dark
  ColorTheme: "Cyan_Theme", // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
  cardBorder: false, // true | false
};
