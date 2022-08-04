export const ifItemExists = (el, func) => {
  if (typeof el !== undefined && el !== null && el.length !== 0) {
    func();
  }
};
