/**
 * Author : Alexander Perlock
 *  
 * Date Created : 29 03 26
 * Date Modified : 29 03 26
 * 
 * Formats AJAX fetch requests
 */

/**
 * Sends a AJAX fetch request through POST
 * 
 * @param {string} url
 * @param {object} body
 * 
 * @return output
 */
export function POST(url, body) {
    return fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams(body)
    });
}