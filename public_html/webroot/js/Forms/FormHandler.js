class Form
{
    // @TODO netjes maken
    container = null;

    _url          = null;
    get url()
    {
        return this._url;
    }

    set url(url)
    {
        this._url = url;
    }

    _submitButton = null;
    get submitButton()
    {
        return this._submitButton;
    }

    set submitButton(element)
    {
        this._submitButton = element;
    }

    _removeButton = null;
    get removeButton()
    {
        return this._removeButton;
    }

    set removeButton(element)
    {
        this._removeButton = element;
    }

    constructor(container = RequiredParam('container'))
    {
        if (container.length == 0)
            throw new Error('`container` is not an DOM-Element!');

        if (container.find('form') == null)
            throw new Error('`container` does not contain any <form> Element!');

        /*********************/
        this.container = container;
        /********************/

        this.url          = container.find('form').attr('action');
        this.submitButton = container.find('.form-submit');
        this.removeButton = container.find('.form-delete');
    }

    getData()
    {
        return this.container.find('form').serialize();
    }
}

/**
 * Form Handler
 *
 * Class used for handling all the actions for a Form.
 * This includes:
 *   > Save
 *   > Delete
 *
 * Dependencies:
 *   > Javascript ES6
 *   > jQuery
 *
 * Written in:
 *   > Javascript ES8
 *   > jQuery 3.4.1
 *
 * @TODO Form Validator (extra class)
 */
class FormHandler
{
    _form = null;

    get form()
    {
        return this._form;
    }

    set form(form)
    {
        if (typeof form !== 'object')
            return false;

        this._form = form;
    }

    constructor(formContainer = RequiredParam('formContainer'))
    {
        this.form = new Form(formContainer);
        this.setEventListeners();
    }

    setEventListeners()
    {
        this.setEventListenerSubmit();
        this.setEventListenerRemove();
    }

    setEventListenerSubmit()
    {
        $(this.form.submitButton).on('click', (e) =>
        {
            console.log('submit');
        });
    }

    setEventListenerRemove()
    {
        var self = this;
        console.log(self.form.url);
        $(this.form.removeButton).on('click', (e) =>
        {
            fetch(self.form.url, {
                method: 'post',
                body: self.form.getData()
            })
            //.then((response) => response.json())
            //.then((response) => {
            //})
            .then((response) => console.log(response));
            console.log('remove');
        });
    }
}


class MissingParameterException
{
    defaultMessage = 'Missing Function Parameter';

    constructor(parameterName)
    {
        let outputMessage = this.defaultMessage;
        if (parameterName != null)
            outputMessage = outputMessage += (' `'+parameterName+'`');
        throw new Error(outputMessage);
    }
}


const RequiredParam = (parameter) => {
    throw new MissingParameterException(parameter);
};
