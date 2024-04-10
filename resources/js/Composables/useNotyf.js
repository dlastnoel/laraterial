import { Notyf } from 'notyf';

const notyf = new Notyf({
  duration: 3000,
  position: {
    x: 'right',
    y: 'bottom',
  },
  types: [
    {
      type: 'warning',
      background: 'orange',
      icon: {
        className: 'material-icons',
        tagName: 'i',
        text: 'warning'
      }
    },
    {
      type: 'error',
      background: 'indianred',
      dismissible: true
    },
    {
      type: 'info',
      background: '#1976D2',
      dismissible: true,
      icon: {
        className: 'mdi mdi-information-variant text-white',
        tagName: 'i',
      }
    }
  ]
})

export default {
  success: (message) => {
    notyf.open({
      type: 'info',
      duration: 500000,
      message: message
    })
  }
}