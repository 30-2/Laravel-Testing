
$('.ui.form')
  .form({
    fields: {
      nickname: {
        identifier: 'nickname',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your name'
          }
        ]
      },
      email: {
        identifier: 'email',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter email.'
          },
          {
            type   : 'email',
            prompt : 'Please enter valid email.'
          }
        ]
      }
    }
  })
;