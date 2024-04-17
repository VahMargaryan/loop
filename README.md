# Event Module for Drupal 10

## Challenge: Create a Simple Custom Drupal Events Website with Custom Modules

### Objective

Develop a Drupal module that enhances the functionality of a Drupal site by providing a custom content type, along with necessary functionality to display, manage, and interact with this content type.

### Requirements

1. **Drupal Initialization**: Using Composer, ensure that the Drupal site is configured with config export functionality (`drush cim`, `drush cex`).

2. **Multilingual Support**: Create the site with English and German language support, ensuring content can be cloned from one language to another.

3. **Custom Content Type**: The module creates a custom content type named "Event" with fields for Title, Description, Date, Location, Image (optional), Organizer, Artists (custom field), and Event Website.

   - **Artists Field**: This is a custom, multi-select, sortable select field populated with values from a JSON file.

4. **Overview Page**: An overview page displays all events sorted by date, featuring title, date, location, and organizer. It includes pagination for lists exceeding 10 events.

5. **Single Event Page**: Detailed event pages provide comprehensive information and utilize a custom theme called "Events Challenge" based on Twig templates.

6. **Event Image Upload**: The module allows for optional image uploads for events, displayed on both list and single event pages.

7. **Extend Event Website Field**: The Event Website field includes a link target selection feature in the backend, enabled through custom module configuration.

8. **API Endpoint**: A RESTful API endpoint (`/api/events`) has been created to list all events with all fields in JSON format, sorted by date.

### Installation

Local Development Environment Setup
To get started with the Event module on your local development environment using Lando, follow these instructions:

Initial Setup
Clone the project repository to your local machine.
Navigate to the project's root directory in your terminal.
Start Lando
`lando start`

Install Dependencies
Run the following commands to install the required PHP dependencies and to set up your Drupal installation:
`lando composer install`
`lando drush deploy`

Import Database
If you have a database dump file, import it using the command below (replace filename.sql with the actual name of your database file):
`lando db-import filename.sql`

Final Checks
Ensure all the requirements listed in the previous sections have been met.
Verify that the site functions as expected and that all configurations have been imported correctly.

Custom Theme (Optional)
The custom theme for the Event module has been created but is not enabled by default. You can:

Visit the Appearance page in your Drupal admin panel to check and enable the custom theme if desired.
