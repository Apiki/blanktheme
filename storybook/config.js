import { configure } from '@storybook/react'
import { setOptions } from '@storybook/addon-options'
// import 'prismjs/themes/prism.css'

setOptions({
  name: 'Blanktheme UI',
  url: 'https://github.com/Apiki/blanktheme',
  addonPanelInRight: false,
  showAddonPanel: false
})

const req = require.context('../components', true, /\.story\.js$/)

function loadStories () {
  req.keys().forEach((filename) => req(filename))
}

configure(loadStories, module)
