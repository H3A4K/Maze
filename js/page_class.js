/**
 * Author : Alexander Perlock
 *  
 * Date Created : 29 03 26
 * Date Modified : 29 03 26
 * 
 * Page Parent class, here to remove circular dependencies
 */

/**
 * Houses basic functions and definitions used by more than one page
 */
export class Page {
    constructor() {
        this.end = 0;
    }

    /**
     * Creates an overlay to render onto the screen
     * 
     * @returns the overlay object
     */
    create_overlay() {
        const disp = document.getElementById("display");
        // disp.classList.add(this.constructor.name.toLowerCase()); // not actually used -> was for css formating
        return disp;
    }

    /**
     * Creates a new element and appends it to a parent
     * 
     * @param parent the HTML parent element
     * @param {string} type the HTML element code, if blank assumed to be a paragraph : "p"
     * @param {string} innerText the innerText of the element
     * @param {string} id the element's id
     * @param {Array<string>} classes the list of the element's classes 
     * 
     * @returns the new element
     */
    create_e(parent, type = "p", innerText, id, classes) {
        const e = document.createElement(type);
        if (innerText) {
            e.innerHTML = innerText;
        }
        if (id) {
            e.id = id;
        }
        if (classes) {
            classes.forEach(c => e.classList.add(c));
        }

        parent.appendChild(e);
        return e;
    }

    /**
     * Gets the page that should be displayed next
     * 
     * @param c the canvas element
     * @param ctx the canvas element's ctx
     * 
     * @returns the next page to be displayed
     */
    get_target(c, ctx) {
        return this.target;
    }

    /**
     * Updates the page and canvas
     * 
     * Parent is empty - allows for calling of a null function
     * 
     * @param c the canvas element
     * @param ctx the canvas element's ctx
     */
    update(c, ctx) {}

    /**
     * Clears the screen of unneeded elements and clears the canvas element
     * 
     * @param c the canvas element
     * @param ctx the canvas element's ctx
     */
    clear(c, ctx) {
        const disp = document.getElementById("display");
        disp.classList.remove(this.constructor.name.toLowerCase());
        disp.innerHTML = "";
        ctx.reset();
    }
}
