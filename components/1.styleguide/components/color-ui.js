'use strict'

import React from 'react'
import t from 'prop-types'
import extractParams from '../utils/extract'

const ColorUi = ({colors}) => {
  let palette = extractParams(colors.value)

  return (
    <div className='color-ui'>
      <h3 className='color-ui__title'>{colors.key}</h3>

      <div className='color-ui__list'>
        {palette.map((color, key) => (
          <Color key={key} hex={color.value} name={color.key} />
        ))}
      </div>
    </div>
  )
}

ColorUi.propTypes = {
  colors: t.object.isRequired
}

const Color = ({hex, name}) => (
  <div className='color'>
    <div
      className='color__swatch'
      style={{ background: hex }}
    />

    <p className='color__name'>{name}</p>
    <p className='color__hex'>HEX: {hex}</p>
  </div>
)

Color.defaultProps = {
  hex: 'rgba(33, 150, 243, 0.4)',
  name: 'light gray'
}
Color.propTypes = {
  hex: t.string,
  name: t.string
}

export { ColorUi }
