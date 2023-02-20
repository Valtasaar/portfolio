/**
 * Very simplified plural function. For count < 21
 *
 * @param {number} count
 * @param {string} language
 **/
export function years(count, language) {
  if ( language === 'en' ) {
    return count === 1 ? 'years' : 'years'
  }

  if ( language === 'ru' ) {
    if ( count === 1 )
      return 'год'
    else if ( count > 1 && count < 5)
      return 'года'
    else return 'лет'
  }
}
