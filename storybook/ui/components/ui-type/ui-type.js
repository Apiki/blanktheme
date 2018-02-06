'use strict'

import React from 'react'
import t from 'prop-types'

const Type = ({slug, name}) => (
  <div className='ui-type'>
    <h3 className='ui-type__slug'>{slug}</h3>
    <h4 className='ui-type__name'>{name}</h4>
    <p className='ui-type__ex' style={{fontFamily: slug}}>ABCDEFGHIJKLM</p>
    <p className='ui-type__ex' style={{fontFamily: slug}}>abcdefghijklm</p>
  </div>
)

Type.defaultProps = {
  slug: 'sans-serif',
  name: 'Sans Serif'
}

Type.propTypes = {
  slug: t.string,
  name: t.string
}

export { Type }
