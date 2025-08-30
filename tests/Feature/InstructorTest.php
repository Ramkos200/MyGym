<?php

use App\Models\ClassType;
use App\Models\SchedualedClass;
use App\Models\User;
use Database\Seeders\ClassTypeSeeder;

test('instructor_can_redirect_to_instructor_dashboard', function () {
    $user = User::factory()->create(['role' => 'instructor']);
    $response = $this->ActingAs($user)->get('/dashboard');

    $response->assertRedirect(route('instructor.dashboard'));
    // Follow the redirect and check the content
    $redirectedResponse = $this->get($response->headers->get('Location'));
    $redirectedResponse->assertSeeText('Hey Instructor');
});
test('instructor_can_schdeule_a_class', function () {
    $user = User::factory()->create(['role' => 'instructor']);
    $this->seed(ClassTypeSeeder::class);
    $response = $this->actingAs($user)->post('instructor/schedule', [
        'class_type_id' => ClassType::first()->id,
        // 'class_type_id' => '1',
        // 'instructor_id' => '15', instructor_id will be passed from the controller Auth::id so always 1
        'date' => '2025-09-18',
        'time' => '09:00:00'
    ]);

    //assert database object exists
    $classType = ClassType::first();
    $this->assertDatabaseHas('schedualed_classes', [
        'class_type_id' => $classType->id,
        'instructor_id' => $user->id, // Use dynamic user ID
        'date_time' => '2025-09-18 09:00:00',
    ]);

    //assert reroute
    $response->assertRedirect(route('schedule.index'));
});

test('instructor_can_cancel_a_class', function () {
    $user = User::factory()->create(['role' => 'instructor']);
    $this->seed(ClassTypeSeeder::class);
    $schedualedclass = SchedualedClass::create([
        'class_type_id' => ClassType::first()->id,
        'instructor_id' => $user->id, // Use dynamic user ID
        'date_time' => '2025-09-19 19:00:00',
    ]);
    $this->actingAs($user)
        ->delete(route('schedule.destroy', $schedualedclass))
        ->assertRedirect(route('schedule.index'));
    $this->assertDatabaseMissing('schedualed_classes', ['id' => $schedualedclass->id]);
});