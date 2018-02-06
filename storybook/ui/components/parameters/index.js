'use strict'

import React from 'react'
import t from 'prop-types'

const Parameters = ({params}) => (
  <div className='table'>
    <table>
      <thead>
        <tr>
          <th>Parâmetro</th>
          <th>Tipo</th>
          <th>Default</th>
          <th>Descrição</th>
        </tr>
      </thead>
      <tbody>
        {params.map((param, key) => (
          <tr key={key}>
            <td>{param.name}</td>
            <td dangerouslySetInnerHTML={{__html: param.type || ''}} />
            <td>{param.default || ''}</td>
            <td dangerouslySetInnerHTML={{__html: param.desc || ''}} />
          </tr>
        ))}
      </tbody>
    </table>
  </div>
)

Parameters.propTypes = {
  params: t.arrayOf(t.object)
}

export { Parameters }
