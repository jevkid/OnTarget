function r = doImageAnalysis(imgPath)
	% Read in image
	img = imread(imgPath);

	% Get points
	targetPos = getTargetPos(img);
	arrows = findArrows(img);
	rings = getRings(img, targetPos);

	% Init output
	ac = length(arrows);
	scores = cell(1, ac);

	% Loop through arrows
	for i = 1:ac

		arrowuser = 1; % getUser(users, arrows{i});
		arrowscore = 10; %calculateScore(rings, arrows{i,:});
		arrowangle = 1; %calculateAngle(targetPos, arrows{i});

		% Format output
		scores{i} = sprintf('%d%c%d%c%d%c',arrowuser,':',arrowscore,':',arrowangle,';');
	end
	r = cell2mat(scores);
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
%	Function: doImageAnalysis
%
% Called From: PHP script on website.
% Returns: An array of strings where each string is a score in CSV form.
% Assumptions: Video was successfully uploaded.
% Description: Main loop for the analysis of a video. It will iterate through each frame and detect new arrows.
% 					   Each time an arrow is detected, it's score and position is calculated and this information is
%						   added to a string of shots. Each of these strings is assigned to a user and returned to PHP.
%
% PSEUDOCODE:
%
% doImageAnalysis(images, users):
% 	for i in xrange(0,count(images)):									# Loop through images.
% 		targetPos = getTargetPos(images[i]):							# Get the position of the target in the image.
% 		arrows = findArrows(images[i]-images[i-1]):						# Returns array of dots.
% 		rings = getRings(images[i])										# Get the rings on the image.
% 		for j in xrange(0,count(arrows)):								# Loop through the array of new arrows.
%				user = getUser(users, arrows[j])						# Find the user for this arrow.
%				score = calculateScore(rings, arrows[j])				# Add the scores to the arrows string.
%				angle = calculateAngle(targetPos, arrows[j])			# Add the angles to the arrows string.
%				scores[user] += score+":"+angle+";"						# Add the score and angle to the users arrow string.
% 	return scores